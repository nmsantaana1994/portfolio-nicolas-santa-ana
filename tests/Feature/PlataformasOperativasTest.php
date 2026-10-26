<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class PlataformasOperativasTest extends TestCase
{
    public function test_distingue_los_dos_sistemas_y_la_participacion_profesional(): void
    {
        $caso = config('portafolio.caso_plataformas_operativas');
        $respuesta = $this->get(route('proyectos.plataformas-operativas'))->assertOk()
            ->assertSee($caso['titulo'])->assertSee($caso['presentacion']);
        foreach ($caso['experiencias'] as $experiencia) {
            foreach (['nombre', 'titulo', 'descripcion', 'participacion'] as $campo) {
                $respuesta->assertSee($experiencia[$campo]);
            }
            foreach ($experiencia['funciones'] as $funcion) {
                $respuesta->assertSee($funcion);
            }
            foreach ($experiencia['tecnica'] as $descripcion) {
                $respuesta->assertSee($descripcion);
            }
        }
        $respuesta->assertSee('Creé ZonalApp y desarrollé la aplicación desde sus bases')
            ->assertSee('otro desarrollador que se sumó posteriormente')
            ->assertSee('Desarrollé CateringOnline junto con mi jefe')
            ->assertSee('interfaz móvil, avisos, sincronización de ajustes, tratamiento de feriados')
            ->assertSee('revisión manual')
            ->assertSee('no implican que todos los módulos estén habilitados en producción')
            ->assertSee('no se presenta la sincronización como perfecta');
    }

    public function test_los_mockups_son_estaticos_ficticios_y_los_detalles_son_secundarios(): void
    {
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get('/proyectos/plataformas-operativas')->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $this->assertSame(1, $xpath->query('//h1')->length);
        $this->assertSame(1, $xpath->query('//figure[@data-demo-zonalapp]')->length);
        $this->assertSame(1, $xpath->query('//figure[@data-demo-cateringonline]')->length);
        $this->assertSame(0, $xpath->query('//main//figure//*[self::input or self::button or self::a]')->length);
        $this->assertSame(0, $xpath->query('//main//img')->length);
        $this->assertSame(0, $xpath->query('//main//svg[not(@aria-hidden="true")]')->length);
        $this->assertSame(2, $xpath->query('//details[@data-tecnica-plataforma]')->length);
        $this->assertSame(0, $xpath->query('//main//details[@open]')->length);
        $this->assertStringContainsString('Dashboard ficticio', $xpath->evaluate('string(//figure[@data-demo-zonalapp])'));
        $this->assertStringContainsString('Pedido ficticio', $xpath->evaluate('string(//figure[@data-demo-cateringonline])'));
        foreach (config('portafolio.caso_plataformas_operativas.experiencias') as $experiencia) {
            $this->assertStringContainsString($experiencia['participacion'], $xpath->evaluate('string(//section[@id="'.$experiencia['id'].'"])'));
        }
        foreach ($xpath->query('//main//a[starts-with(@href,"#")]') as $enlace) {
            $this->assertSame(1, $xpath->query('//*[@id="'.substr($enlace->getAttribute('href'), 1).'"]')->length);
        }
    }

    public function test_tiene_seo_propio_y_conserva_la_url_del_autor(): void
    {
        config(['app.url' => 'https://portfolio.example.com/']);
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get(route('proyectos.plataformas-operativas'))->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $seo = config('portafolio.caso_plataformas_operativas.seo');
        $url = 'https://portfolio.example.com/proyectos/plataformas-operativas';
        $this->assertSame(1, $xpath->query('//link[@rel="canonical"]')->length);
        $this->assertSame($url, $xpath->evaluate('string(//link[@rel="canonical"]/@href)'));
        $this->assertSame($url, $xpath->evaluate('string(//meta[@property="og:url"]/@content)'));
        foreach (['//title', '//meta[@property="og:title"]/@content', '//meta[@name="twitter:title"]/@content'] as $consulta) {
            $this->assertSame($seo['titulo'], $xpath->evaluate('string('.$consulta.')'));
        }
        $this->assertSame($seo['descripcion'], $xpath->evaluate('string(//meta[@name="description"]/@content)'));
        $autor = json_decode($xpath->evaluate('string(//script[@type="application/ld+json"])'), true, flags: JSON_THROW_ON_ERROR);
        $this->assertSame('https://portfolio.example.com', $autor['url']);
    }

    public function test_la_home_tiene_un_solo_acceso_agrupado_y_preserva_los_casos_anteriores(): void
    {
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get(route('inicio'))->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $this->assertSame(1, $xpath->query('//*[@id="proyectos"]//a[@href="/proyectos/plataformas-operativas"]')->length);
        $this->assertSame(5, $xpath->query('//*[@id="proyectos"]//article')->length);
        foreach (['terminales', 'sgm-healthy', 'soluciones-comerciales', 'foco-finanzas'] as $caso) {
            $this->assertGreaterThan(0, $xpath->query('//a[@href="/proyectos/'.$caso.'"]')->length);
        }
        $this->get(route('proyectos.plataformas-operativas'))->assertOk()
            ->assertSee('href="/servicios"', false)
            ->assertSee('href="/#proyectos"', false)
            ->assertSee('href="mailto:'.config('portafolio.contacto.email').'"', false);
    }
}
