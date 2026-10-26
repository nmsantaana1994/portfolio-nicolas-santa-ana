<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class SolucionesComercialesTest extends TestCase
{
    public function test_presenta_las_dos_experiencias_y_distingue_la_autoria(): void
    {
        $caso = config('portafolio.caso_empresarial');
        $respuesta = $this->get(route('proyectos.soluciones-comerciales'))->assertOk()
            ->assertSee($caso['titulo'])->assertSee($caso['presentacion']);
        $this->assertCount(2, $caso['experiencias']);

        foreach ($caso['experiencias'] as $experiencia) {
            foreach (['nombre', 'tipo', 'contexto', 'desafio', 'participacion', 'resultado'] as $campo) {
                $respuesta->assertSee($experiencia[$campo]);
            }

            foreach ($experiencia['funcionalidades'] as $funcionalidad) {
                $respuesta->assertSee($funcionalidad['titulo'])->assertSee($funcionalidad['descripcion']);
            }

            foreach (['Implementado', 'Validado', 'Despliegue', 'Pendiente'] as $estado) {
                $respuesta->assertSee($estado)->assertSee($experiencia['evidencia'][$estado]);
            }
        }

        $respuesta->assertSee('reconstrucción completa y del desarrollo integral')
            ->assertSee('no implica autoría de los sistemas externos')
            ->assertSee('Recibí una aplicación web heredada')
            ->assertSee('no de construcción desde cero')
            ->assertSee('no certifica qué versión está desplegada')
            ->assertSee('No publica pantallas internas');
    }

    public function test_el_seo_es_especifico_y_el_autor_conserva_la_url_principal(): void
    {
        config(['app.url' => 'https://portfolio.example.com/']);
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get('/proyectos/soluciones-comerciales')->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $seo = config('portafolio.caso_empresarial.seo');
        $url = 'https://portfolio.example.com/proyectos/soluciones-comerciales';

        $this->assertSame(1, $xpath->query('//link[@rel="canonical"]')->length);
        $this->assertSame($url, $xpath->evaluate('string(//link[@rel="canonical"]/@href)'));
        $this->assertSame($url, $xpath->evaluate('string(//meta[@property="og:url"]/@content)'));
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

    public function test_la_home_conserva_sus_casos_y_enlaza_a_la_pagina_empresarial(): void
    {
        $respuesta = $this->get(route('inicio'))->assertOk()
            ->assertSee('href="/proyectos/soluciones-comerciales"', false)
            ->assertSee('Centralfarm y GlobalMed: ver caso empresarial');
        $this->assertCount(4, config('portafolio.proyectos'));
        $documento = new DOMDocument;
        @$documento->loadHTML($respuesta->getContent());
        $xpath = new DOMXPath($documento);
        $this->assertSame(4, $xpath->query('//section[@id="proyectos"]//article')->length);

        foreach (config('portafolio.proyectos') as $proyecto) {
            $respuesta->assertSee($proyecto['nombre'])->assertSee($proyecto['resultado']);
        }
    }

    public function test_el_aporte_y_el_resultado_son_visibles_y_el_detalle_se_reserva_a_la_evidencia(): void
    {
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get(route('proyectos.soluciones-comerciales'))->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $this->assertSame(1, $xpath->query('//h1')->length);
        $this->assertSame(0, $xpath->query('//main//img | //main//form')->length);
        $this->assertSame(2, $xpath->query('//details[@data-evidencia-empresarial]')->length);
        $this->assertSame(0, $xpath->query('//details[@open]')->length);

        foreach (config('portafolio.caso_empresarial.experiencias') as $experiencia) {
            $seccion = $xpath->query('//section[@id="'.$experiencia['id'].'"]')->item(0);
            $this->assertNotNull($seccion);
            $visible = $xpath->query('.//p[not(ancestor::details)]', $seccion);
            $texto = implode(' ', array_map(fn ($nodo) => $nodo->textContent, iterator_to_array($visible)));
            $this->assertStringContainsString($experiencia['participacion'], $texto);
            $this->assertStringContainsString($experiencia['resultado'], $texto);
        }

        foreach ($xpath->query('//main//a[starts-with(@href,"#")]') as $enlace) {
            $this->assertSame(1, $xpath->query('//*[@id="'.substr($enlace->getAttribute('href'), 1).'"]')->length);
        }
    }

    public function test_ofrece_contacto_regreso_servicios_y_cv_solo_si_existe(): void
    {
        config(['portafolio.cv.archivo' => 'robots.txt', 'portafolio.cv.nombre_descarga' => 'cv-prueba.pdf']);
        $this->get(route('proyectos.soluciones-comerciales'))->assertOk()
            ->assertSee('href="mailto:'.config('portafolio.contacto.email').'"', false)
            ->assertSee('href="/servicios"', false)
            ->assertSee('href="/#proyectos"', false)
            ->assertSee('href="/#contacto"', false)
            ->assertSee('download="cv-prueba.pdf"', false);

        config(['portafolio.cv.archivo' => 'cv/inexistente.pdf']);
        $this->get(route('proyectos.soluciones-comerciales'))->assertOk()
            ->assertDontSee('Descargar CV')->assertDontSee('cv/inexistente.pdf');
    }
}
