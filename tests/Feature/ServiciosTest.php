<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class ServiciosTest extends TestCase
{
    public function test_presenta_cuatro_capacidades_con_problema_solucion_y_experiencia(): void
    {
        $servicios = config('portafolio.servicios');
        $respuesta = $this->get(route('servicios'))->assertOk()
            ->assertSee($servicios['titulo'])
            ->assertSee($servicios['presentacion']);

        $this->assertCount(4, $servicios['capacidades']);

        foreach ($servicios['capacidades'] as $capacidad) {
            foreach (['titulo', 'problema', 'solucion', 'evidencia', 'enlace'] as $campo) {
                $respuesta->assertSee($capacidad[$campo]);
            }

            $destino = route($capacidad['ruta'], [], false).'#'.$capacidad['ancla'];
            $respuesta->assertSee('href="'.$destino.'"', false);
            $this->get(route($capacidad['ruta']))->assertOk()->assertSee('id="'.$capacidad['ancla'].'"', false);
        }

        foreach ($servicios['forma_trabajo'] as $paso) {
            $respuesta->assertSee($paso['titulo'])->assertSee($paso['descripcion']);
        }

        $documento = new DOMDocument;
        @$documento->loadHTML($respuesta->getContent());
        $xpath = new DOMXPath($documento);
        $this->assertSame(4, $xpath->query('//article[@data-servicio]')->length);
        $this->assertSame(1, $xpath->query('//h1')->length);
        $this->assertSame(0, $xpath->query('//form')->length);
    }

    public function test_tiene_seo_propio_y_el_autor_sigue_apuntando_a_la_home(): void
    {
        config(['app.url' => 'https://portfolio.example.com/']);
        $respuesta = $this->get('/servicios')->assertOk();
        $documento = new DOMDocument;
        @$documento->loadHTML($respuesta->getContent());
        $xpath = new DOMXPath($documento);
        $seo = config('portafolio.servicios.seo');

        $this->assertSame(1, $xpath->query('//link[@rel="canonical"]')->length);
        $this->assertSame('https://portfolio.example.com/servicios', $xpath->evaluate('string(//link[@rel="canonical"]/@href)'));
        $this->assertSame('https://portfolio.example.com/servicios', $xpath->evaluate('string(//meta[@property="og:url"]/@content)'));
        $this->assertSame($seo['titulo'], $xpath->evaluate('string(//title)'));
        $this->assertSame($seo['titulo'], $xpath->evaluate('string(//meta[@property="og:title"]/@content)'));
        $this->assertSame($seo['titulo'], $xpath->evaluate('string(//meta[@name="twitter:title"]/@content)'));
        $this->assertSame($seo['descripcion'], $xpath->evaluate('string(//meta[@name="description"]/@content)'));
        $this->assertSame($seo['descripcion'], $xpath->evaluate('string(//meta[@property="og:description"]/@content)'));
        $this->assertSame($seo['descripcion'], $xpath->evaluate('string(//meta[@name="twitter:description"]/@content)'));
        $this->assertSame('summary_large_image', $xpath->evaluate('string(//meta[@name="twitter:card"]/@content)'));
        $autor = json_decode($xpath->evaluate('string(//script[@type="application/ld+json"])'), true, flags: JSON_THROW_ON_ERROR);
        $this->assertSame('https://portfolio.example.com', $autor['url']);
    }

    public function test_la_navegacion_comparte_servicios_y_preserva_las_anclas_de_la_home(): void
    {
        foreach (['inicio', 'proyectos.foco-finanzas', 'servicios'] as $ruta) {
            $respuesta = $this->get(route($ruta))->assertOk()->assertSee('href="/servicios"', false);
            $documento = new DOMDocument;
            @$documento->loadHTML($respuesta->getContent());
            $xpath = new DOMXPath($documento);
            $this->assertSame(2, $xpath->query('//header//a[@href="/servicios"]')->length);
            $this->assertSame($ruta === 'servicios' ? 2 : 0, $xpath->query('//header//a[@aria-current="page"]')->length);
        }

        $this->get(route('inicio'))->assertOk()->assertSee('Conocer mis servicios');
        $this->get(route('servicios'))->assertOk()
            ->assertSee('href="/#experiencia"', false)
            ->assertSee('href="/#contacto"', false)
            ->assertSee('href="/#proyectos"', false)
            ->assertSee('href="/"', false);
    }

    public function test_ofrece_contacto_directo_y_cv_sin_formularios_ni_enlaces_rotos(): void
    {
        config(['portafolio.cv.archivo' => 'robots.txt', 'portafolio.cv.nombre_descarga' => 'cv-prueba.pdf']);
        $this->get(route('servicios'))->assertOk()
            ->assertSee('href="mailto:'.config('portafolio.contacto.email').'"', false)
            ->assertSee('href="'.config('portafolio.contacto.linkedin').'"', false)
            ->assertSee('download="cv-prueba.pdf"', false)
            ->assertSee('href="'.asset('robots.txt').'"', false);

        config(['portafolio.cv.archivo' => 'cv/inexistente.pdf']);
        $this->get(route('servicios'))->assertOk()
            ->assertDontSee('cv/inexistente.pdf')
            ->assertDontSee('Descargar CV')
            ->assertSee('href="/#cv"', false);
    }
}
