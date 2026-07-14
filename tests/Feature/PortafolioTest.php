<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortafolioTest extends TestCase
{
    public function test_el_portafolio_se_muestra_con_su_contenido_principal(): void
    {
        $response = $this->get(route('inicio'));

        $response
            ->assertOk()
            ->assertSee('Nicolás Martín Santa Ana')
            ->assertSee('Full Stack PHP/Laravel Developer')
            ->assertSee('Proyectos destacados')
            ->assertSee('nmsantaana1994@gmail.com')
            ->assertSee('id="contacto"', false);
    }

    public function test_el_portafolio_incluye_metadatos_seo_y_open_graph(): void
    {
        $response = $this->get(route('inicio'));

        $response
            ->assertOk()
            ->assertSee('<meta name="description"', false)
            ->assertSee('<meta property="og:title"', false)
            ->assertSee('<meta property="og:description"', false)
            ->assertSee('<link rel="canonical"', false);
    }

    public function test_el_cv_faltante_no_genera_un_enlace_roto(): void
    {
        $rutaCv = public_path(config('portafolio.cv.archivo'));

        if (is_file($rutaCv)) {
            $this->markTestSkipped('El CV ya existe y corresponde validar el enlace de descarga.');
        }

        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('CV disponible próximamente')
            ->assertDontSee(asset(config('portafolio.cv.archivo')));
    }
}
