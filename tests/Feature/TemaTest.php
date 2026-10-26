<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class TemaTest extends TestCase
{
    public function test_todas_las_paginas_comparten_un_selector_nativo_con_tres_opciones(): void
    {
        foreach (['inicio', 'servicios', 'proyectos.foco-finanzas', 'proyectos.soluciones-comerciales'] as $ruta) {
            $html = $this->get(route($ruta))->assertOk()->getContent();
            $documento = new DOMDocument;
            @$documento->loadHTML($html);
            $xpath = new DOMXPath($documento);
            $this->assertSame(1, $xpath->query('//header//select[@data-selector-tema]')->length);
            $this->assertSame('Tema del portfolio', trim($xpath->evaluate('string(//label[select[@data-selector-tema]]/span)')));
            $this->assertSame(3, $xpath->query('//select[@data-selector-tema]/option')->length);
            foreach (['system' => 'Sistema', 'light' => 'Claro', 'dark' => 'Oscuro'] as $valor => $texto) {
                $this->assertSame($texto, $xpath->evaluate('string(//select[@data-selector-tema]/option[@value="'.$valor.'"])'));
            }
            $this->assertSame(1, $xpath->query('//meta[@name="color-scheme" and @content="light dark"]')->length);
            $this->assertSame(2, $xpath->query('//meta[@name="theme-color"]')->length);
            $this->assertLessThan(strpos($html, '@font-face'), strpos($html, "const key = 'portfolio-theme'"));
        }
    }

    public function test_el_tema_del_portfolio_no_sustituye_el_selector_historico_de_foco(): void
    {
        $this->get(route('proyectos.foco-finanzas'))->assertOk()
            ->assertSee('data-selector-tema', false)
            ->assertSee('aria-pressed="true" data-tema-foco="dark"', false)
            ->assertSee('aria-pressed="false" data-tema-foco="light"', false)
            ->assertSee('el tema sólo cambia las capturas');
    }
}
