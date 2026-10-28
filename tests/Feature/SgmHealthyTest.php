<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class SgmHealthyTest extends TestCase
{
    public function test_comunica_el_proceso_las_responsabilidades_y_la_autoria(): void
    {
        $caso = config('portafolio.caso_sgm_healthy');
        $respuesta = $this->get(route('proyectos.sgm-healthy'))->assertOk();
        foreach (['titulo', 'presentacion', 'problema', 'solucion', 'participacion'] as $campo) {
            $respuesta->assertSee($caso[$campo]);
        }
        $respuesta->assertSee('Creé y desarrollé SGM y Healthy desde sus bases')
            ->assertSee('desarrollador principal de SGM')
            ->assertSee('no un producto médico')
            ->assertSee('autenticación propia')
            ->assertSee('Cada aplicación conserva sus responsabilidades')
            ->assertSee('Pruebas en SGM')
            ->assertDontSee('no identificó cobertura específica de negocio');
        foreach ($caso['aplicaciones'] as $aplicacion) {
            $respuesta->assertSee($aplicacion['descripcion']);
            foreach ($aplicacion['funciones'] as $funcion) {
                $respuesta->assertSee($funcion);
            }
        }
        foreach ($caso['tecnica'] as $descripcion) {
            $respuesta->assertSee($descripcion);
        }
    }

    public function test_los_mockups_son_ficticios_y_el_recorrido_no_depende_de_interaccion(): void
    {
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get('/proyectos/sgm-healthy')->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $this->assertSame(1, $xpath->query('//h1')->length);
        $this->assertSame(2, $xpath->query('//article[@data-aplicacion]')->length);
        $this->assertSame(5, $xpath->query('//ol[@data-recorrido-sgm-healthy]/li')->length);
        $this->assertSame(1, $xpath->query('//figure[@data-sgm-healthy-demo]')->length);
        $this->assertSame(1, $xpath->query('//*[@data-demo-sgm]')->length);
        $this->assertSame(1, $xpath->query('//*[@data-demo-healthy]')->length);
        $this->assertSame(0, $xpath->query('//figure[@data-sgm-healthy-demo]//*[self::button or self::input or self::a]')->length);
        $this->assertSame(0, $xpath->query('//main//img')->length);
        $this->assertSame(0, $xpath->query('//main//svg[not(@aria-hidden="true")]')->length);
        $this->assertSame(1, $xpath->query('//details[@data-tecnica-sgm-healthy]')->length);
        $this->assertSame(0, $xpath->query('//details[@open]')->length);
        $this->assertSame(0, $xpath->query('//*[@data-recorrido-sgm-healthy]/ancestor::details')->length);
        $mockup = $xpath->evaluate('string(//figure[@data-sgm-healthy-demo])');
        $this->assertStringContainsString('Mi espacio', $mockup);
        $this->assertStringContainsString('24 porciones', $mockup);
        $this->assertStringNotContainsString('Demo', $mockup);
        $this->assertStringContainsString('no pantallas internas', $mockup);
        foreach ($xpath->query('//main//a[starts-with(@href,"#")]') as $enlace) {
            $this->assertSame(1, $xpath->query('//*[@id="'.substr($enlace->getAttribute('href'), 1).'"]')->length);
        }
    }

    public function test_el_seo_es_especifico_y_el_json_ld_conserva_el_autor_principal(): void
    {
        config(['app.url' => 'https://portfolio.example.com/']);
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get(route('proyectos.sgm-healthy'))->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $url = 'https://portfolio.example.com/proyectos/sgm-healthy';
        $seo = config('portafolio.caso_sgm_healthy.seo');
        $this->assertSame(1, $xpath->query('//link[@rel="canonical"]')->length);
        $this->assertSame($url, $xpath->evaluate('string(//link[@rel="canonical"]/@href)'));
        $this->assertSame($url, $xpath->evaluate('string(//meta[@property="og:url"]/@content)'));
        foreach (['//title', '//meta[@property="og:title"]/@content', '//meta[@name="twitter:title"]/@content'] as $consulta) {
            $this->assertSame($seo['titulo'], $xpath->evaluate('string('.$consulta.')'));
        }
        foreach (['name="description"', 'property="og:description"', 'name="twitter:description"'] as $atributo) {
            $this->assertSame($seo['descripcion'], $xpath->evaluate('string(//meta[@'.$atributo.']/@content)'));
        }
        $autor = json_decode($xpath->evaluate('string(//script[@type="application/ld+json"])'), true, flags: JSON_THROW_ON_ERROR);
        $this->assertSame('https://portfolio.example.com', $autor['url']);
    }

    public function test_se_integra_sin_eliminar_casos_y_ofrece_contacto_servicios_y_regreso(): void
    {
        $this->assertCount(4, config('portafolio.proyectos'));
        $this->get(route('inicio'))->assertOk()
            ->assertSee('href="/proyectos/sgm-healthy"', false)
            ->assertSee('href="/proyectos/terminales"', false)
            ->assertSee('href="/proyectos/soluciones-comerciales"', false)
            ->assertSee('href="/proyectos/foco-finanzas"', false)
            ->assertSee('Terminales + Agente')
            ->assertSee('SGM + Healthy');
        $this->get(route('proyectos.sgm-healthy'))->assertOk()
            ->assertSee('href="/#proyectos"', false)
            ->assertSee('href="/servicios"', false)
            ->assertSee('href="mailto:'.config('portafolio.contacto.email').'"', false);
    }
}
