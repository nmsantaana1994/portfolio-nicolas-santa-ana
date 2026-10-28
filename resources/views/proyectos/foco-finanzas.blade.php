@extends('layouts.portafolio')

@section('contenido')
    @php($proyecto = $portafolio['proyecto_insignia'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1" data-galeria-foco>
        <section class="fondo-hero border-b border-slate-200 py-6 sm:py-16">
            <div class="foco-presentacion mx-auto grid max-w-7xl gap-6 px-5 sm:px-8 md:grid-cols-[minmax(0,1.25fr)_minmax(0,0.75fr)] md:items-center md:gap-x-10 lg:gap-x-16 lg:px-10">
                <div class="foco-intro">
                    <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}#foco-finanzas" class="inline-flex min-h-11 items-center text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) {{ __('ui_common.volver_al_portfolio') }}</a>
                    <p class="mt-6 text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.caso_de_estudio') }} {{ $proyecto['contexto'] }}</p>
                    <h1 class="mt-4 text-4xl leading-tight font-bold tracking-tight text-tinta-950 sm:text-5xl lg:text-6xl">{{ __('ui_foco.foco_finanzas_del_movimiento_diario_a_la_planificacion') }}</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-tinta-600">{{ $proyecto['presentacion_caso'] }}</p>
                </div>
                @include('portafolio.parciales.captura-foco', ['escena' => $proyecto['escenas'][0], 'prioritaria' => true])
                <div class="foco-detalle">
                    <p class="mt-4 max-w-2xl leading-7 text-tinta-600">{{ __('ui_foco.disene_y_desarrolle_el_producto_completo_modelo_de') }}</p>
                    <a href="#producto-en-uso" class="hero-accion mt-6 inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 font-semibold text-white hover:bg-acento-600">{{ __('ui_common.explorar_el_producto') }} @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                    <div class="mt-5 rounded-xl border border-slate-200 bg-white/80 p-3 sm:p-4">
                        <p class="text-sm font-semibold text-tinta-950">{{ __('ui_common.tema_de_las_capturas') }}</p>
                        <div class="selector-capturas mt-2 inline-flex rounded-lg bg-tinta-950 p-1" role="group" aria-label="{{ __('ui_common.tema_de_las_capturas') }}">
                            <button type="button" class="min-h-11 rounded-md px-4 text-sm font-semibold text-slate-300" aria-pressed="false" data-tema-foco="light">{{ __('ui_common.claro') }}</button>
                            <button type="button" class="min-h-11 rounded-md bg-white px-4 text-sm font-semibold text-tinta-950" aria-pressed="true" data-tema-foco="dark">{{ __('ui_common.oscuro') }}</button>
                        </div>
                        <p class="mt-3 text-xs leading-5 text-tinta-600">{{ __('ui_foco.todos_los_datos_visibles_son_sinteticos_capturas_historicas') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <nav class="border-b border-slate-200 bg-white" aria-label="{{ __('ui_common.contenido_del_caso') }}">
            <div class="mx-auto flex max-w-7xl flex-wrap gap-x-6 gap-y-1 px-5 py-4 text-sm font-semibold text-acento-700 sm:px-8 lg:px-10">
                @foreach (['problema-solucion' => 'Problema y solución', 'producto-en-uso' => 'Producto', 'participacion' => 'Mi aporte', 'decisiones' => 'Decisiones', 'calidad' => 'Calidad y entrega'] as $ancla => $etiqueta)
                    <a href="#{{ $ancla }}" class="inline-flex min-h-11 items-center underline decoration-transparent underline-offset-4 hover:decoration-current">{{ \App\Support\PortfolioContent::label($etiqueta) }}</a>
                @endforeach
            </div>
        </nav>

        <section id="problema-solucion" class="scroll-mt-24 py-14 sm:py-20" aria-labelledby="titulo-problema">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.el_punto_de_partida') }}</p>
                <h2 id="titulo-problema" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_foco.los_movimientos_aislados_no_cuentan_toda_la_historia') }}</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <article class="superficie-tarjeta rounded-2xl border border-slate-200 p-6 sm:p-8">
                        <h3 class="font-bold text-tinta-950">{{ __('ui_common.el_problema') }}</h3>
                        <p class="mt-3 leading-7 text-tinta-600">{{ $proyecto['problema'] }}</p>
                    </article>
                    <article class="rounded-2xl border border-blue-100 bg-acento-50 p-6 sm:p-8">
                        <h3 class="font-bold text-tinta-950">{{ __('ui_common.la_respuesta_del_producto') }}</h3>
                        <p class="mt-3 leading-7 text-tinta-600">{{ $proyecto['solucion'] }}</p>
                    </article>
                </div>
                <p class="mt-6 max-w-3xl text-sm leading-6 text-tinta-600">{{ __('ui_foco.el_alcance_es_la_organizacion_y_lectura_de') }}</p>
            </div>
        </section>

        <section id="producto-en-uso" class="scroll-mt-24 border-y border-slate-200 bg-slate-50 py-14 sm:py-20" aria-labelledby="titulo-producto">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.producto_en_uso_galeria') }}</p>
                <h2 id="titulo-producto" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_common.de_registrar_a_comprender_y_planificar') }}</h2>
                <p class="mt-4 max-w-2xl leading-7 text-tinta-600">{{ $proyecto['descripcion'] }}</p>
                <p class="mt-4 max-w-3xl rounded-xl border border-blue-100 bg-acento-50 p-4 text-sm leading-6 text-tinta-600">{{ $proyecto['nota_visual'] }}</p>
                <div class="mt-10 space-y-12 sm:space-y-16">
                    @foreach ($proyecto['funcionalidades'] as $grupo => $funcionalidad)
                        <article class="grid min-w-0 gap-6 border-t border-slate-200 pt-8 md:grid-cols-[minmax(0,0.85fr)_minmax(0,1.15fr)] md:gap-12">
                            <div>
                                <p class="text-sm font-bold text-acento-700">0{{ $loop->iteration }}</p>
                                <h3 class="mt-3 text-2xl font-bold tracking-tight text-tinta-950">{{ $funcionalidad['titulo'] }}</h3>
                                <p class="mt-4 max-w-lg leading-7 text-tinta-600">{{ $funcionalidad['descripcion'] }}</p>
                            </div>
                            <div class="min-w-0 space-y-6">
                                @foreach ($proyecto['escenas'] as $escena)
                                    @if ($escena['grupo'] === $grupo)
                                        @include('portafolio.parciales.captura-foco', ['escena' => $escena, 'prioritaria' => false])
                                    @endif
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="border-b border-slate-200 bg-slate-50 pb-14 sm:pb-20" aria-label="{{ __('ui_foco.experiencia_privacidad_y_administracion') }}">
            <div class="mx-auto grid max-w-7xl gap-5 px-5 sm:px-8 lg:grid-cols-3 lg:px-10">
                @foreach ($proyecto['capacidades'] as $capacidad)
                        <article class="superficie-tarjeta rounded-2xl border border-slate-200 bg-white p-6">
                        <h2 class="text-lg font-bold text-tinta-950">{{ $capacidad['titulo'] }}</h2>
                        <p class="mt-3 text-sm leading-7 text-tinta-600">{{ $capacidad['descripcion'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="participacion" class="scroll-mt-24 py-14 sm:py-20" aria-labelledby="titulo-participacion">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.mi_participacion') }}</p>
                <h2 id="titulo-participacion" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_foco.construir_el_producto_y_sostener_su_evolucion') }}</h2>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-tinta-600">{{ $proyecto['responsabilidades'] }}</p>
                <p class="mt-4 max-w-3xl leading-7 text-tinta-600">{{ __('ui_foco.el_backend_se_organiza_como_un_monolito_modular') }}</p>
                <ul class="mt-6 flex flex-wrap gap-2" aria-label="{{ __('ui_common.tecnologias_del_proyecto') }}">
                    @foreach ($proyecto['stack'] as $tecnologia)
                        <li class="rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-medium text-tinta-700">{{ \App\Support\PortfolioContent::label($tecnologia) }}</li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section id="decisiones" class="scroll-mt-24 bg-tinta-950 py-14 text-white sm:py-20" aria-labelledby="titulo-decisiones">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-blue-300">{{ __('ui_common.decisiones_tecnicas') }}</p>
                <h2 id="titulo-decisiones" class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">{{ __('ui_foco.reglas_claras_antes_que_complejidad_accidental') }}</h2>
                <div class="mt-8 grid gap-5 lg:grid-cols-2">
                    @foreach ($proyecto['decisiones'] as $decision)
                        <article class="rounded-2xl border border-white/15 bg-white/5 p-6 sm:p-8">
                            <h3 class="text-xl font-bold">{{ $decision['titulo'] }}</h3>
                            <dl class="mt-5 space-y-4 text-sm leading-6">
                                @foreach (['problema' => 'Problema', 'descripcion' => 'Decisión', 'consecuencia' => 'Consecuencia práctica'] as $campo => $etiqueta)
                                    <div><dt class="font-bold text-blue-200">{{ \App\Support\PortfolioContent::label($etiqueta) }}</dt><dd class="mt-1 text-slate-300">{{ $decision[$campo] }}</dd></div>
                                @endforeach
                            </dl>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="calidad" class="scroll-mt-24 py-14 sm:py-20" aria-labelledby="titulo-calidad">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.calidad_y_entrega') }}</p>
                <h2 id="titulo-calidad" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_common.probar_las_reglas_cuidar_cada_entrega') }}</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">{{ __('ui_foco.las_pruebas_comprueban_reglas_financieras_flujos_de_uso') }}</p>
                <p class="mt-4 max-w-3xl leading-7 text-tinta-600">{{ __('ui_foco.phpunit_y_playwright_respaldan_este_proceso_github_actions') }}</p>
                <div class="mt-8 rounded-2xl border border-blue-100 bg-acento-50 p-6 sm:p-8">
                    <h3 class="text-lg font-bold text-tinta-950">{{ __('ui_foco.validaciones_documentadas_octubre_de_2026') }}</h3>
                    <p class="mt-2 text-sm leading-6 text-tinta-600">{{ __('ui_foco.resultados_historicos_del_10_10_2026_separados_por') }}</p>
                    <dl class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($proyecto['metricas'] as $metrica)
                            <div><dt class="text-sm font-semibold text-tinta-700">{{ $metrica['etiqueta'] }}</dt><dd class="mt-2 text-4xl font-bold text-acento-700">{{ $metrica['valor'] }}</dd><dd class="mt-2 text-xs leading-5 text-tinta-600">{{ $metrica['detalle'] }}</dd></div>
                        @endforeach
                    </dl>
                </div>
                <details class="group mt-6 rounded-2xl border border-slate-200" data-alcance-evidencia>
                    <summary class="cursor-pointer rounded-2xl px-5 py-5 font-semibold text-acento-700">{{ __('ui_common.pruebas_recuperacion_y_seguridad') }}</summary>
                    <div class="border-t border-slate-200 p-5 sm:p-6">
                        <h3 class="font-bold text-tinta-950">{{ __('ui_common.pruebas_y_entrega') }}</h3>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">{{ __('ui_foco.phpunit_cubre_pruebas_unit_y_feature_incluida_concurrencia') }}</p>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">{{ __('ui_foco.docker_es_el_entorno_principal_de_desarrollo_de') }}</p>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">{{ __('ui_foco.la_evidencia_browser_documentada_del_20_10_2026') }}</p>
                        <h3 class="mt-6 font-bold text-tinta-950">{{ __('ui_common.recuperacion') }}</h3>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">{{ __('ui_foco.en_julio_se_valido_un_restore_local_sintetico') }}</p>
                        <h3 class="mt-6 font-bold text-tinta-950">{{ __('ui_common.seguridad_y_privacidad') }}</h3>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">{{ __('ui_foco.la_seguridad_combina_autorizacion_por_propietario_mfa_administrativo') }}</p>
                    </div>
                </details>
            </div>
        </section>

        <section class="border-t border-slate-200 py-14 sm:py-16" aria-labelledby="titulo-evolucion">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.evolucion_del_producto') }}</p>
                <h2 id="titulo-evolucion" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950">{{ __('ui_foco.del_mvp_a_una_beta_mas_explicable_y') }}</h2>
                <ol class="mt-8 grid gap-5 lg:grid-cols-3">
                    @foreach ($proyecto['evolucion'] as $hito)
                        <li class="rounded-2xl border border-slate-200 p-6">
                            <p class="text-xs font-bold uppercase tracking-wide text-acento-700">{{ $hito['periodo'] }}</p>
                            <h3 class="mt-3 text-xl font-bold text-tinta-950">{{ $hito['titulo'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-tinta-600">{{ $hito['descripcion'] }}</p>
                        </li>
                    @endforeach
                </ol>
                <p class="mt-6 max-w-3xl text-sm leading-6 text-tinta-600">{{ __('ui_foco.review_scope', ['date' => $proyecto['revision']]) }}</p>
            </div>
        </section>

        <section class="border-t border-slate-200 bg-slate-50 py-14 sm:py-16" aria-labelledby="titulo-estado">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-estado" class="text-2xl font-bold tracking-tight text-tinta-950">{{ __('ui_common.un_producto_propio_en_evolucion') }}</h2>
                <p class="mt-4 max-w-3xl leading-7 text-tinta-600">{{ __('ui_foco.documented_status', ['state' => $proyecto['estado']]) }}</p>
                <p class="mt-4 max-w-3xl leading-7 text-tinta-600">{{ __('ui_foco.si_necesitas_construir_o_evolucionar_una_aplicacion_con') }}</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}#contacto" class="hero-accion inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 font-semibold text-white hover:bg-acento-600">{{ __('ui_common.contactar') }}</a>
                    <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}#proyectos" class="inline-flex min-h-12 items-center rounded-lg border border-slate-300 bg-white px-5 font-semibold text-tinta-700 hover:bg-acento-50">{{ __('ui_common.ver_otros_proyectos') }}</a>
                    @if ($cvDisponible)
                        <a href="{{ asset($portafolio['cv']['archivo']) }}" download="{{ $portafolio['cv']['nombre_descarga'] }}" class="inline-flex min-h-12 items-center px-3 font-semibold text-acento-700 underline underline-offset-4">{{ __('ui_common.descargar_cv') }}</a>
                    @endif
                </div>
            </div>
        </section>

        <dialog class="visor-foco" aria-labelledby="visor-foco-titulo" aria-describedby="visor-foco-ayuda" data-visor-foco>
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 p-4">
                <h2 id="visor-foco-titulo" class="font-bold text-tinta-950">{{ __('ui_common.captura_de_foco_finanzas') }}</h2>
                <form method="dialog"><button autofocus class="min-h-11 rounded-lg border border-slate-300 px-4 text-sm font-semibold text-tinta-700">{{ __('ui_common.cerrar_imagen') }}</button></form>
            </div>
            <div class="flex flex-wrap items-center gap-3 px-4 py-3">
                <button type="button" class="hero-accion min-h-11 rounded-lg border border-slate-300 px-4 text-sm font-semibold text-tinta-700 hover:bg-acento-50" aria-pressed="false" aria-controls="visor-foco-area" data-visor-original data-fit-label="{{ __('labels.ajustar_imagen') }}" data-original-label="{{ __('ui_common.ver_tamano_original') }}" data-original-status="{{ __('labels.tamano_original_desplaza_el_area_para_explorar_los_detalles_usa_escape_para_cerrar') }}" data-fit-status="{{ __('ui_foco.imagen_ajustada_al_espacio_disponible_usa_escape_para') }}">{{ __('ui_common.ver_tamano_original') }}</button>
                <p id="visor-foco-ayuda" class="text-sm text-tinta-600" aria-live="polite" data-visor-estado>{{ __('ui_foco.imagen_ajustada_al_espacio_disponible_usa_escape_para') }}</p>
            </div>
            <div id="visor-foco-area" class="visor-foco-area" tabindex="0" role="region" aria-label="{{ __('ui_common.captura_ampliada_desplazable') }}">
                <img alt="" data-visor-imagen>
            </div>
        </dialog>
    </main>
    @include('portafolio.parciales.footer')
@endsection
