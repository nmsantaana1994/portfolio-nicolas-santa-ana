<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class FocoFinanzasTest extends TestCase
{
    public function test_el_visor_abre_ajustado_y_ofrece_control_explicito_de_tamano_original(): void
    {
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get(route('proyectos.foco-finanzas'))->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $this->assertSame(1, $xpath->query('//dialog//button[@data-visor-original and @aria-pressed="false" and @aria-controls="visor-foco-area"]')->length);
        $this->assertSame(0, $xpath->query('//dialog[@data-original]')->length);
        $this->assertSame(1, $xpath->query('//dialog//*[@aria-live="polite"]')->length);
        $this->assertStringContainsString('Ver tamaño original', $xpath->evaluate('string(//button[@data-visor-original])'));
        $this->assertSame(1, $xpath->query('//div[contains(@class,"foco-intro")]/following-sibling::figure[1]')->length);
        $this->assertSame(1, $xpath->query('//figure/following-sibling::div[contains(@class,"foco-detalle")]')->length);
    }

    public function test_el_caso_tiene_seo_propio_y_el_autor_conserva_la_url_del_portfolio(): void
    {
        config(['app.url' => 'https://portfolio.example.com/']);

        $respuesta = $this->get('/proyectos/foco-finanzas')->assertOk();
        $documento = new DOMDocument;
        @$documento->loadHTML($respuesta->getContent());
        $xpath = new DOMXPath($documento);
        $url = 'https://portfolio.example.com/proyectos/foco-finanzas';

        $this->assertSame(1, $xpath->query('//link[@rel="canonical"]')->length);
        $this->assertSame($url, $xpath->evaluate('string(//link[@rel="canonical"]/@href)'));
        $this->assertSame($url, $xpath->evaluate('string(//meta[@property="og:url"]/@content)'));
        $titulo = $xpath->evaluate('string(//title)');
        $descripcion = $xpath->evaluate('string(//meta[@name="description"]/@content)');
        $this->assertStringContainsString('Foco Finanzas', $titulo);
        $this->assertNotSame(config('portafolio.seo.descripcion'), $descripcion);
        $this->assertSame($titulo, $xpath->evaluate('string(//meta[@property="og:title"]/@content)'));
        $this->assertSame($titulo, $xpath->evaluate('string(//meta[@name="twitter:title"]/@content)'));
        $this->assertSame($descripcion, $xpath->evaluate('string(//meta[@property="og:description"]/@content)'));
        $this->assertSame($descripcion, $xpath->evaluate('string(//meta[@name="twitter:description"]/@content)'));
        $this->assertSame('summary_large_image', $xpath->evaluate('string(//meta[@name="twitter:card"]/@content)'));
        $autor = json_decode($xpath->evaluate('string(//script[@type="application/ld+json"])'), true, flags: JSON_THROW_ON_ERROR);
        $this->assertSame('Person', $autor['@type']);
        $this->assertSame('https://portfolio.example.com', $autor['url']);
        $this->assertSame(1, $xpath->query('//h1')->length);
    }

    public function test_la_home_enlaza_al_caso_sin_duplicar_su_detalle_tecnico(): void
    {
        $this->get(route('inicio'))->assertOk()
            ->assertSee('href="/proyectos/foco-finanzas"', false)
            ->assertSee('Ver caso completo')
            ->assertSee('id="foco-finanzas"', false)
            ->assertSee('foco-dashboard-mobile.png')
            ->assertDontSee('data-detalle-foco', false)
            ->assertDontSee('Consecuencia práctica');
    }

    public function test_el_caso_muestra_producto_aporte_decisiones_y_limites_de_la_evidencia(): void
    {
        $respuesta = $this->get(route('proyectos.foco-finanzas'))->assertOk();

        foreach (config('portafolio.proyecto_insignia.funcionalidades') as $grupo) {
            $respuesta->assertSee($grupo['titulo'])->assertSee($grupo['descripcion']);
        }

        foreach (config('portafolio.proyecto_insignia.decisiones') as $decision) {
            $respuesta->assertSee($decision['problema'])->assertSee($decision['descripcion'])->assertSee($decision['consecuencia']);
        }

        $respuesta->assertSee(config('portafolio.proyecto_insignia.responsabilidades'))
            ->assertSee('Validaciones documentadas · octubre de 2026')
            ->assertSee('no métricas actuales')
            ->assertSee('48 tablas')
            ->assertSee('No acredita recuperación integral de archivos adjuntos')
            ->assertSee('opt-in explícito')
            ->assertSee('17/07/2026')
            ->assertSee('Repositorio privado');
    }

    public function test_diferencia_evidencia_fechada_producto_integrado_y_estado_remoto_no_verificado(): void
    {
        $proyecto = config('portafolio.proyecto_insignia');
        $respuesta = $this->get(route('proyectos.foco-finanzas'))->assertOk();

        foreach ($proyecto['capacidades'] as $capacidad) {
            $respuesta->assertSee($capacidad['titulo'])->assertSee($capacidad['descripcion']);
        }

        foreach ($proyecto['evolucion'] as $hito) {
            $respuesta->assertSee($hito['periodo'])->assertSee($hito['titulo']);
        }

        foreach ($proyecto['metricas'] as $metrica) {
            $respuesta->assertSee($metrica['valor'])->assertSee($metrica['detalle']);
        }

        $respuesta->assertSee('25/10/2026')
            ->assertSee('10/10/2026')
            ->assertSee('11.286 aserciones · 43 omitidos')
            ->assertSee('12.046 aserciones · 1 omitido')
            ->assertSee('runner Linux self-hosted')
            ->assertSee('experimentales y manuales')
            ->assertSee('171 casos aprobados y 11 omitidos')
            ->assertSee('30/09/2026')
            ->assertSee('no se consultó el estado remoto actual')
            ->assertSee('no implica nuevas admisiones')
            ->assertSee($proyecto['nota_visual'])
            ->assertDontSee('Evidencia histórica · 31/07/2026')
            ->assertDontSee('href="https://github.com/nmsantaana1994/foco-finanzas', false);

        $this->get(route('inicio'))->assertOk()
            ->assertSee('Captura histórica')
            ->assertSee('17/07/2026')
            ->assertSee($proyecto['estado'])
            ->assertDontSee('604');
    }

    public function test_el_caso_ofrece_navegacion_de_regreso_y_ampliacion_nativa(): void
    {
        $respuesta = $this->get(route('proyectos.foco-finanzas'))->assertOk();
        $documento = new DOMDocument;
        @$documento->loadHTML($respuesta->getContent());
        $xpath = new DOMXPath($documento);

        foreach (config('portafolio.navegacion') as $item) {
            $destino = isset($item['ruta']) ? route($item['ruta'], [], false) : '/#'.$item['ancla'];
            $respuesta->assertSee('href="'.$destino.'"', false);
        }

        $respuesta->assertSee('Volver al portfolio')->assertSee('Ver otros proyectos')->assertSee('Contactar');
        $this->assertSame(6, $xpath->query('//a[@data-ampliar-foco]')->length);
        $this->assertSame(1, $xpath->query('//dialog[@aria-labelledby="visor-foco-titulo"]')->length);
        $this->assertSame(1, $xpath->query('//dialog//form[@method="dialog"]')->length);
        $this->assertSame(1, $xpath->query('//button[@data-tema-foco="dark" and @aria-pressed="true"]')->length);

        foreach ($xpath->query('//nav[@aria-label="Contenido del caso"]//a') as $enlace) {
            $this->assertSame(1, $xpath->query('//*[@id="'.substr($enlace->getAttribute('href'), 1).'"]')->length);
        }

        foreach (config('portafolio.proyecto_insignia.escenas') as $escena) {
            foreach (['light', 'dark'] as $tema) {
                $imagen = public_path('images/projects/foco/'.$tema.'/'.$escena['archivo']);
                $this->assertFileExists($imagen);
                [$ancho, $alto] = getimagesize($imagen);
                $this->assertSame([$escena['ancho'], $escena['alto']], [$ancho, $alto]);
            }
        }
    }

    public function test_el_caso_no_ofrece_un_cv_inexistente(): void
    {
        config(['portafolio.cv.archivo' => 'cv/inexistente.pdf']);

        $this->get(route('proyectos.foco-finanzas'))->assertOk()->assertDontSee('Descargar CV')->assertDontSee('cv/inexistente.pdf');
    }

    public function test_la_presentacion_prioriza_el_producto_y_reserva_los_detalles_de_evidencia(): void
    {
        $respuesta = $this->get(route('proyectos.foco-finanzas'))->assertOk()
            ->assertSee(config('portafolio.proyecto_insignia.presentacion_caso'))
            ->assertSee('Diseñé y desarrollé el producto completo')
            ->assertSee('Capturas históricas del 17/07/2026')
            ->assertSeeInOrder(['id="producto-en-uso"', 'id="participacion"', 'id="calidad"'], false);
        $documento = new DOMDocument;
        @$documento->loadHTML($respuesta->getContent());
        $xpath = new DOMXPath($documento);

        $this->assertSame(1, $xpath->query('//details[@data-alcance-evidencia]')->length);
        $this->assertSame(0, $xpath->query('//details[@data-alcance-evidencia and @open]')->length);
        $this->assertSame(0, $xpath->query('//section[@id="producto-en-uso"]//details')->length);
        $this->assertSame(1, $xpath->query('//section[@id="calidad"]//dl[not(ancestor::details)]')->length);
        $this->assertStringContainsString('recuperación y la seguridad', $xpath->evaluate('string(//details[@data-alcance-evidencia]/summary)'));
    }
}
