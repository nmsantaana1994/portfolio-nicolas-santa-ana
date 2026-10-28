<?php

namespace Tests\Feature;

use App\Support\PortfolioContent;
use App\Support\PortfolioLocale;
use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class FullTranslationTest extends TestCase
{
    public function test_english_pages_do_not_fall_back_to_spanish_editorial_text(): void
    {
        $pairs = [];
        foreach (File::files(lang_path('es')) as $file) {
            $group = $file->getFilenameWithoutExtension();
            foreach (require $file->getPathname() as $key => $spanish) {
                $english = trans($group.'.'.$key, [], 'en');
                // "Personal" is also a valid English word (e.g. personal finance).
                if ($english !== $spanish && $spanish !== 'Personal' && ! preg_match('/:[a-z_]+/', $spanish)) {
                    $pairs[$spanish] = $group.'.'.$key;
                }
            }
        }
        foreach (PortfolioLocale::PAGES as $name => [$path]) {
            $html = $this->get('/en'.($path === '/' ? '' : $path))->assertOk()->getContent();
            $dom = new DOMDocument;
            @$dom->loadHTML($html);
            $x = new DOMXPath($dom);
            $nodes = $x->query('//body//text()[not(ancestor::script) and not(ancestor::style)] | //@aria-label | //@alt | //@title | //title/text() | //meta[@name="description"]/@content');
            $text = preg_replace('/\s+/u', ' ', implode(' ', array_map(fn ($node) => $node->nodeValue, iterator_to_array($nodes))));
            foreach ($pairs as $spanish => $key) {
                $normalized = preg_replace('/\s+/u', ' ', $spanish);
                $this->assertDoesNotMatchRegularExpression('/(?<!\pL)'.preg_quote($normalized, '/').'(?!\pL)/u', $text, $name.': untranslated '.$key);
            }
            $this->assertStringNotContainsString('ui_common.', $text);
            $this->assertStringNotContainsString('caso_empresarial.', $text);
            $this->assertDoesNotMatchRegularExpression('/\b(?:Desarrollo|Aplicaciones|Tecnologías|Pruebas|Recuperación|Sincronización|Planificación|Comensales|Volver|Descargar|Contactar)\b/u', $text);
            foreach ($x->query('//a[@download]') as $link) {
                $this->assertStringContainsString('Spanish', $link->textContent);
            }
        }
    }

    public function test_structural_project_data_and_verified_figures_are_shared(): void
    {
        app()->setLocale('en');
        $localized = PortfolioContent::localized();
        $original = config('portafolio');
        foreach (['cv', 'contacto'] as $key) {
            $this->assertSame($original[$key], $localized[$key]);
        }
        foreach ($original['proyectos'] as $i => $project) {
            foreach (['nombre', 'ruta_caso', 'icono'] as $key) {
                $this->assertSame($project[$key], $localized['proyectos'][$i][$key]);
            }
        }
        foreach ($original['proyecto_insignia']['metricas'] as $i => $metric) {
            $this->assertSame($metric['valor'], $localized['proyecto_insignia']['metricas'][$i]['valor']);
        }
        foreach ($original['proyecto_insignia']['escenas'] as $i => $scene) {
            foreach (['archivo', 'grupo', 'ancho', 'alto', 'formato', 'principal'] as $key) {
                $this->assertSame($scene[$key], $localized['proyecto_insignia']['escenas'][$i][$key]);
            }
        }
    }
}
