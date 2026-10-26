<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class NavegacionAccesibleTest extends TestCase
{
    public function test_el_salto_tiene_destino_enfocable_sin_agregarlo_a_la_tabulacion(): void
    {
        foreach (['inicio', 'servicios', 'proyectos.foco-finanzas', 'proyectos.soluciones-comerciales', 'proyectos.terminales'] as $ruta) {
            $documento = new DOMDocument;
            @$documento->loadHTML($this->get(route($ruta))->assertOk()->getContent());
            $xpath = new DOMXPath($documento);
            $this->assertSame(1, $xpath->query('//main[@id="contenido" and @tabindex="-1"]')->length);
            $this->assertSame(1, $xpath->query('//a[@href="#contenido"]')->length);
            $this->assertSame(0, $xpath->query('//*[@tabindex > 0]')->length);
            $this->assertSame(0, $xpath->query('//a//*[text()="↘" or text()="↗" or text()="↓"]')->length);
        }
    }

    public function test_servicios_ofrece_un_unico_acceso_directo_a_la_experiencia_empresarial(): void
    {
        $documento = new DOMDocument;
        @$documento->loadHTML($this->get(route('servicios'))->assertOk()->getContent());
        $xpath = new DOMXPath($documento);
        $this->assertSame(1, $xpath->query('//main//a[@href="/proyectos/soluciones-comerciales"]')->length);
        $this->assertSame(1, $xpath->query('//section[@id="capacidades"]//a[@href="/proyectos/soluciones-comerciales"]')->length);
        $this->assertStringContainsString('Ver experiencia aplicada', $xpath->evaluate('string(//a[@href="/proyectos/soluciones-comerciales"])'));
        $this->assertGreaterThan(0, $xpath->query('//a[starts-with(@href,"mailto:")]')->length);
        $this->assertSame(0, $xpath->query('//a//svg[not(@aria-hidden="true") or not(@focusable="false")]')->length);
    }
}
