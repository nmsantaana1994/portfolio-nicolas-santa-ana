<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortafolioTest extends TestCase
{
    public function test_la_home_carga_con_el_contenido_y_las_secciones_principales(): void
    {
        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('Nicolás Martín Santa Ana')
            ->assertSee('Full Stack PHP/Laravel Developer')
            ->assertSee('aria-label="Nicolás Santa Ana — volver al inicio"', false)
            ->assertSee('id="sobre-mi"', false)
            ->assertSee('id="stack"', false)
            ->assertSee('id="experiencia"', false)
            ->assertSee('id="proyectos"', false)
            ->assertSee('id="cv"', false)
            ->assertSee('id="contacto"', false);
    }

    public function test_los_metadatos_usan_la_url_https_configurada_y_el_json_ld_es_valido(): void
    {
        config(['app.url' => 'https://portfolio.example.com']);

        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('<link rel="canonical" href="https://portfolio.example.com">', false)
            ->assertSee('<meta property="og:url" content="https://portfolio.example.com">', false)
            ->assertSee('"@context":"https://schema.org"', false)
            ->assertSee('"@type":"Person"', false);
    }

    public function test_incluye_favicon_e_imagen_social_con_sus_metadatos(): void
    {
        $imagenSocial = config('portafolio.seo.imagen');

        $this->assertFileExists(public_path('favicon.svg'));
        $this->assertFileExists(public_path($imagenSocial));

        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('<link rel="icon"', false)
            ->assertSee('/'.$imagenSocial, false)
            ->assertSee('<meta property="og:image:width" content="1200">', false)
            ->assertSee('<meta property="og:image:height" content="630">', false)
            ->assertSee('<meta name="twitter:card" content="summary_large_image">', false)
            ->assertSee('<meta name="twitter:image"', false);
    }

    public function test_la_home_incluye_los_enlaces_principales(): void
    {
        $contacto = config('portafolio.contacto');

        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('href="'.$contacto['github'].'"', false)
            ->assertSee('href="'.$contacto['linkedin'].'"', false)
            ->assertSee('href="mailto:'.$contacto['email'].'"', false);
    }

    public function test_muestra_cuatro_proyectos_con_contexto_y_resultado(): void
    {
        $proyectos = config('portafolio.proyectos');

        $this->assertCount(4, $proyectos);

        foreach ($proyectos as $proyecto) {
            $this->assertArrayHasKey('contexto', $proyecto);
            $this->assertArrayHasKey('resultado', $proyecto);
        }

        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('Sistema de gestión para comedores corporativos')
            ->assertSee('Terminales offline con sincronización')
            ->assertSee('PWA para operación de depósito')
            ->assertSee('Plataforma web para droguería')
            ->assertSee('Resultado')
            ->assertDontSee('Challenge técnico Laravel / API REST');
    }

    public function test_un_cv_presente_genera_un_enlace_de_descarga(): void
    {
        config([
            'portafolio.cv.archivo' => 'robots.txt',
            'portafolio.cv.nombre_descarga' => 'cv-prueba.pdf',
        ]);

        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('href="'.asset('robots.txt').'"', false)
            ->assertSee('download="cv-prueba.pdf"', false)
            ->assertDontSee('CV disponible próximamente');
    }

    public function test_un_cv_ausente_no_genera_un_enlace_roto(): void
    {
        $archivoInexistente = 'cv/archivo-que-no-existe.pdf';

        config(['portafolio.cv.archivo' => $archivoInexistente]);

        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('CV disponible próximamente')
            ->assertSee('href="#cv"', false)
            ->assertDontSee('href="'.asset($archivoInexistente).'"', false);
    }
}
