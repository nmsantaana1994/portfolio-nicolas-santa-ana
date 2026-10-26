<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortafolioTest extends TestCase
{
    public function test_los_resumenes_profesionales_distinguen_autoria_y_conservan_evidencia_tecnica(): void
    {
        $this->get(route('inicio'))->assertOk()
            ->assertSee('Estuve a cargo de la reconstrucción integral de la aplicación web actual')
            ->assertSee('sin atribuirme su desarrollo ni las reglas comerciales preexistentes')
            ->assertSee('Recibí una aplicación web existente')
            ->assertSee('continuidad del sistema y su evolución gradual')
            ->assertSee('Proyecto propio')
            ->assertSee('Beta privada')
            ->assertSee('PostgreSQL')
            ->assertSee('PHPUnit')
            ->assertSee('Playwright')
            ->assertSee('GitHub Actions')
            ->assertDontSee('Cloud / DevOps')
            ->assertDontSee('SQL Server');
    }

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
            ->assertSee('id="foco-finanzas"', false)
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

    public function test_la_home_incorpora_instrument_sans_desde_los_assets_locales(): void
    {
        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('@font-face', false)
            ->assertSee('font-family: "Instrument Sans";', false)
            ->assertSee('format("woff', false)
            ->assertDontSee('fonts.bunny.net');
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

    public function test_el_hero_prioriza_proyectos_y_contacto_y_conserva_la_descarga_del_cv(): void
    {
        $this->get(route('inicio'))
            ->assertOk()
            ->assertSeeInOrder([
                'Desarrollo software para',
                'resolver problemas reales.',
                'Ver proyectos',
                'Contactar',
                'Descargar CV',
                'Oportunidades laborales y proyectos freelance',
            ])
            ->assertDontSee('Ver GitHub');
    }

    public function test_la_navegacion_apunta_a_secciones_existentes(): void
    {
        $documento = new \DOMDocument;
        @$documento->loadHTML($this->get(route('inicio'))->assertOk()->getContent());
        $xpath = new \DOMXPath($documento);
        $enlaces = $xpath->query('//nav[@aria-label="Navegación principal"]//a[starts-with(@href, "#")]');

        $this->assertSame(6, $enlaces->length);

        foreach ($enlaces as $enlace) {
            $ancla = substr($enlace->getAttribute('href'), 1);
            $this->assertSame(1, $xpath->query('//*[@id="'.$ancla.'"]')->length);
        }
    }

    public function test_los_proyectos_aparecen_despues_del_hero_y_se_conservan_las_anclas(): void
    {
        $documento = new \DOMDocument;
        @$documento->loadHTML($this->get(route('inicio'))->assertOk()->getContent());
        $xpath = new \DOMXPath($documento);
        $secciones = $xpath->query('//main/section');
        $orden = [];

        foreach ($secciones as $seccion) {
            $orden[] = $seccion->getAttribute('id');
        }

        $this->assertSame([
            'inicio', 'foco-finanzas', 'proyectos', 'experiencia',
            'competencias', 'sobre-mi', 'contacto', 'cv',
        ], $orden);
        $this->assertSame(1, $xpath->query('//*[@id="stack"]')->length);
        $this->assertSame(1, $xpath->query('//*[@id="titulo-foco"]')->length);
        $this->assertSame(0, $xpath->query('//*[@data-detalle-foco and @open]')->length);
    }

    public function test_los_casos_y_las_herramientas_siguen_disponibles_en_la_home(): void
    {
        $respuesta = $this->get(route('inicio'))->assertOk();

        foreach (config('portafolio.proyectos') as $proyecto) {
            $respuesta->assertSee($proyecto['nombre'])->assertSee($proyecto['resumen'])->assertSee($proyecto['distintivo']);
        }

        foreach (config('portafolio.stack') as $herramientas) {
            foreach ($herramientas as $herramienta) {
                $respuesta->assertSee($herramienta);
            }
        }

        $respuesta->assertSee('Oportunidades laborales y proyectos freelance')
            ->assertSee('proyecto freelance')
            ->assertSee('Ver caso completo');
    }

    public function test_los_casos_ofrecen_resumen_y_acceso_directo_sin_desplegables(): void
    {
        $documento = new \DOMDocument;
        @$documento->loadHTML($this->get(route('inicio'))->assertOk()->getContent());
        $xpath = new \DOMXPath($documento);
        $casos = $xpath->query('//*[@id="proyectos"]//article');
        $proyectos = config('portafolio.proyectos');

        $this->assertSame(count($proyectos), $casos->length);

        foreach ($casos as $indice => $caso) {
            $this->assertStringContainsString($proyectos[$indice]['resumen'], $caso->textContent);
            $this->assertStringContainsString($proyectos[$indice]['distintivo'], $caso->textContent);
            $enlaces = $xpath->query('.//a', $caso);
            $this->assertSame(1, $enlaces->length);
            $this->assertSame(route($proyectos[$indice]['ruta_caso'], [], false), $enlaces->item(0)->getAttribute('href'));
            $this->assertStringContainsString($proyectos[$indice]['nombre'], $enlaces->item(0)->textContent);
            $this->assertSame(0, $xpath->query('.//details | .//dl', $caso)->length);
            $this->assertSame(1, $xpath->query('./div/span/svg[@aria-hidden="true"][@focusable="false"]', $caso)->length);
        }

        $this->assertSame(0, $xpath->query('//*[@id="foco-finanzas"]//dl')->length);
        $this->assertSame(1, $xpath->query('//*[@id="foco-finanzas"]/div/div/figure')->length);
        $this->assertSame(1, $xpath->query('//*[@id="foco-finanzas"]//a[@href="/proyectos/foco-finanzas"]')->length);
    }

    public function test_prioriza_los_cuatro_casos_laborales_y_conserva_el_relevamiento_previo(): void
    {
        $proyectos = config('portafolio.proyectos');

        $this->assertCount(4, $proyectos);
        $this->assertCount(5, config('portafolio.experiencia_adicional_proyectos'));

        foreach ($proyectos as $proyecto) {
            $this->assertArrayHasKey('contexto', $proyecto);
            $this->assertArrayHasKey('distintivo', $proyecto);
        }

        $this->get(route('inicio'))
            ->assertOk()
            ->assertSee('Centralfarm + GlobalMed')
            ->assertSee('Terminales + Agente')
            ->assertSee('SGM + Healthy')
            ->assertSee('ZonalApp + CateringOnline')
            ->assertDontSee('Challenge técnico Laravel / API REST');
    }

    public function test_presenta_foco_como_proyecto_insignia_con_evidencia_fechada(): void
    {
        $proyecto = config('portafolio.proyecto_insignia');

        $this->assertSame('Foco Finanzas', $proyecto['nombre']);
        $this->assertCount(4, $proyecto['metricas']);
        $this->assertCount(6, $proyecto['decisiones']);
        $this->assertCount(6, $proyecto['escenas']);

        $this->get(route('proyectos.foco-finanzas'))
            ->assertOk()
            ->assertSee('Caso de estudio')
            ->assertSee('Validaciones documentadas · octubre de 2026')
            ->assertSee('1.299')
            ->assertSee('tests aprobados · SQLite')
            ->assertSee('Beta privada activa en staging')
            ->assertSee('Todos los datos visibles son sintéticos')
            ->assertSee('data-galeria-foco', false)
            ->assertSee('data-tema-foco="light"', false)
            ->assertSee('data-tema-foco="dark"', false)
            ->assertSee('aria-pressed="false" data-tema-foco="light"', false)
            ->assertSee('aria-pressed="true" data-tema-foco="dark"', false);
    }

    public function test_las_escenas_de_foco_tienen_variantes_clara_y_oscura_publicables(): void
    {
        $escenas = config('portafolio.proyecto_insignia.escenas');
        $respuesta = $this->get(route('proyectos.foco-finanzas'))->assertOk();

        foreach ($escenas as $escena) {
            foreach (['light', 'dark'] as $tema) {
                $ruta = "images/projects/foco/{$tema}/{$escena['archivo']}";

                $this->assertFileExists(public_path($ruta));
                $respuesta->assertSee(asset($ruta), false);
            }

            $respuesta
                ->assertSee($escena['nombre'])
                ->assertSee($escena['alt'])
                ->assertSee($escena['descripcion']);
        }
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
