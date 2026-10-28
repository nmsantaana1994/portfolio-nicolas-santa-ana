<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class TerminalesTest extends TestCase
{
    public function test_presenta_problema_solucion_y_autoria_sin_exagerar_el_offline(): void
    {
        $caso = config('portafolio.caso_terminales');
        $respuesta = $this->get(route('proyectos.terminales'))->assertOk();

        foreach (['titulo', 'presentacion', 'problema', 'solucion', 'participacion'] as $campo) {
            $respuesta->assertSee($caso[$campo]);
        }

        $respuesta->assertSee('Creé y desarrollé desde cero Terminales y Agente Terminales')
            ->assertSee('Soy responsable del desarrollo de ambos sistemas')
            ->assertSee('no todos los circuitos pueden operar offline')
            ->assertSee('depende de la información disponible localmente')
            ->assertSee('Edge es una línea en desarrollo y laboratorio')
            ->assertDontSee('no adjunta resultados fechados')
            ->assertDontSee('no certifica')
            ->assertDontSee('El historial también incluye');

        foreach ($caso['calidad'] as $titulo => $descripcion) {
            $respuesta->assertSee($titulo)->assertSee($descripcion);
        }
    }

    public function test_el_diagrama_es_conceptual_y_el_aporte_se_lee_sin_expandir_detalles(): void
    {
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get('/proyectos/terminales')->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $this->assertSame(3, $xpath->query('//ol[@data-flujo-terminales]/li')->length);
        $this->assertSame(0, $xpath->query('//main//img')->length);
        $this->assertSame(1, $xpath->query('//h1')->length);
        $this->assertSame(1, $xpath->query('//main[@tabindex="-1"]')->length);
        $this->assertStringContainsString(config('portafolio.caso_terminales.participacion'), $xpath->evaluate('string(//*[@id="participacion"])'));
        $this->assertSame(0, $xpath->query('//*[@id="participacion"]//details')->length);
        $this->assertSame(5, $xpath->query('//ol[@data-recorrido-terminales]/li')->length);
        $this->assertSame(1, $xpath->query('//figure[@data-terminal-demo]')->length);
        $this->assertSame(0, $xpath->query('//figure[@data-terminal-demo]//button')->length);
        $this->assertStringContainsString('Recreación ficticia', $xpath->evaluate('string(//figure[@data-terminal-demo]/figcaption)'));
        $this->assertStringNotContainsString('Demo', $xpath->evaluate('string(//figure[@data-terminal-demo])'));
        $this->assertSame(0, $xpath->query('//main//svg[not(@aria-hidden="true")]')->length);
        $this->assertSame(0, $xpath->query('//main//details[@open]')->length);

        foreach (['Terminal operativa', 'Agente local', 'Sistema central', 'C# / .NET', 'SQLite', 'Laravel', 'MySQL'] as $texto) {
            $this->assertStringContainsString($texto, $xpath->evaluate('string(//ol[@data-flujo-terminales])'));
        }

        foreach ($xpath->query('//main//a[starts-with(@href,"#")]') as $enlace) {
            $this->assertSame(1, $xpath->query('//*[@id="'.substr($enlace->getAttribute('href'), 1).'"]')->length);
        }
    }

    public function test_tiene_seo_propio_y_el_autor_conserva_la_url_de_la_home(): void
    {
        config(['app.url' => 'https://portfolio.example.com/']);
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get('/proyectos/terminales')->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $seo = config('portafolio.caso_terminales.seo');
        $url = 'https://portfolio.example.com/proyectos/terminales';
        $this->assertSame(1, $xpath->query('//link[@rel="canonical"]')->length);
        $this->assertSame($url, $xpath->evaluate('string(//link[@rel="canonical"]/@href)'));
        $this->assertSame($url, $xpath->evaluate('string(//meta[@property="og:url"]/@content)'));
        $this->assertSame($seo['titulo'], $xpath->evaluate('string(//title)'));
        $this->assertSame($seo['titulo'], $xpath->evaluate('string(//meta[@property="og:title"]/@content)'));
        $this->assertSame($seo['descripcion'], $xpath->evaluate('string(//meta[@name="description"]/@content)'));
        $this->assertSame($seo['descripcion'], $xpath->evaluate('string(//meta[@name="twitter:description"]/@content)'));
        $autor = json_decode($xpath->evaluate('string(//script[@type="application/ld+json"])'), true, flags: JSON_THROW_ON_ERROR);
        $this->assertSame('https://portfolio.example.com', $autor['url']);
    }

    public function test_la_home_enlaza_el_caso_y_la_pagina_ofrece_regreso_servicios_y_contacto(): void
    {
        $this->get(route('inicio'))->assertOk()
            ->assertSee('href="/proyectos/terminales"', false)
            ->assertSee('Terminales + Agente');
        $this->get(route('proyectos.terminales'))->assertOk()
            ->assertSee('href="/#proyectos"', false)
            ->assertSee('href="/servicios"', false)
            ->assertSee('href="mailto:'.config('portafolio.contacto.email').'"', false)
            ->assertSee('data-apariencia', false)
            ->assertDontSee('data-galeria-foco', false);
    }
}
