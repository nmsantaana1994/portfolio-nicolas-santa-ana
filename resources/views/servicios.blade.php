@extends('layouts.portafolio')

@section('contenido')
    @php($servicios = $portafolio['servicios'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1">
        <section class="fondo-hero border-b border-slate-200 py-10 sm:py-16" aria-labelledby="titulo-servicios">
            <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,0.8fr)] lg:items-center lg:gap-16 lg:px-10">
                <div>
                    <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}" class="inline-flex min-h-11 items-center text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) {{ __('ui_common.volver_al_portfolio') }}</a>
                    <p class="mt-6 text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_services.servicios_profesionales_nicolas_santa_ana') }}</p>
                    <h1 id="titulo-servicios" class="mt-4 max-w-3xl text-4xl leading-tight font-bold tracking-tight text-tinta-950 sm:text-5xl lg:text-6xl">{{ $servicios['titulo'] }}</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-tinta-600">{{ $servicios['presentacion'] }}</p>
                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="mailto:{{ $portafolio['contacto']['email'] }}" class="hero-accion inline-flex min-h-12 items-center justify-center rounded-lg bg-acento-700 px-5 py-3 text-sm font-semibold text-white hover:bg-tinta-950">{{ __('ui_common.contame_tu_proyecto') }}</a>
                        <a href="#capacidades" class="hero-accion inline-flex min-h-12 items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-tinta-950 hover:bg-acento-50">{{ __('ui_common.explorar_servicios') }} @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                    </div>
                </div>
                <aside class="rounded-2xl bg-tinta-950 p-6 text-white sm:p-8" aria-labelledby="titulo-punto-partida">
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-blue-300">{{ __('ui_common.un_punto_de_partida_concreto') }}</p>
                    <h2 id="titulo-punto-partida" class="mt-3 text-2xl font-bold tracking-tight">{{ __('ui_common.que_necesitas_resolver') }}</h2>
                    <ul class="mt-5 space-y-4 text-sm leading-6 text-slate-200">
                        <li class="border-b border-white/15 pb-4">{{ __('ui_services.organizar_un_proceso_con_una_aplicacion_propia') }}</li>
                        <li class="border-b border-white/15 pb-4">{{ __('ui_services.conectar_herramientas_que_hoy_trabajan_por_separado') }}</li>
                        <li>{{ __('ui_services.mejorar_una_aplicacion_que_ya_forma_parte_de') }}</li>
                    </ul>
                    <p class="mt-6 text-sm leading-6 text-slate-300">{{ __('ui_services.el_alcance_se_define_a_partir_de_tu') }}</p>
                </aside>
            </div>
        </section>

        <section id="capacidades" class="scroll-mt-24 py-14 sm:py-16" aria-labelledby="titulo-capacidades">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.como_puedo_ayudarte') }}</p>
                <h2 id="titulo-capacidades" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_services.construir_lo_que_falta_mejorar_lo_que_existe') }}</h2>
                <p class="mt-4 max-w-2xl leading-7 text-tinta-600">{{ __('ui_services.cuatro_capacidades_que_se_pueden_combinar_segun_las') }}</p>
                <a href="{{ \App\Support\PortfolioLocale::route('proyectos.soluciones-comerciales', [], false) }}" class="mt-4 inline-flex min-h-11 items-center gap-2 rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4 hover:text-tinta-950">{{ __('ui_common.ver_experiencia_aplicada_centralfarm_y_globalmed') }} @include('portafolio.parciales.indicador-enlace')</a>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    @foreach ($servicios['capacidades'] as $capacidad)
                        <article class="superficie-tarjeta flex min-w-0 flex-col rounded-2xl border border-slate-200 bg-white p-6 sm:p-8" data-servicio>
                            <p class="text-sm font-bold text-acento-700" aria-hidden="true">0{{ $loop->iteration }}</p>
                            <h3 class="mt-3 text-2xl font-bold tracking-tight text-tinta-950">{{ $capacidad['titulo'] }}</h3>
                            <p class="mt-4 text-sm leading-7 text-tinta-600">{{ $capacidad['problema'] }}</p>
                            <p class="mt-3 leading-7 text-tinta-700">{{ $capacidad['solucion'] }}</p>
                            <div class="mt-6 border-t border-slate-200 pt-5">
                                <p class="text-xs font-bold uppercase tracking-wide text-tinta-400">{{ __('ui_common.experiencia_aplicada') }}</p>
                                <p class="mt-2 text-sm leading-6 text-tinta-600">{{ $capacidad['evidencia'] }}</p>
                            </div>
                            <a href="{{ \App\Support\PortfolioLocale::route($capacidad['ruta'], [], false) }}#{{ $capacidad['ancla'] }}" class="mt-auto inline-flex min-h-11 items-center gap-2 self-start rounded-md pt-5 text-sm font-semibold text-acento-700 underline underline-offset-4 hover:text-tinta-950">{{ $capacidad['enlace'] }} @include('portafolio.parciales.indicador-enlace')</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="border-y border-slate-200 bg-slate-50 py-14 sm:py-16" aria-labelledby="titulo-forma-trabajo">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.forma_de_trabajo') }}</p>
                <h2 id="titulo-forma-trabajo" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_services.primero_el_problema_despues_la_solucion') }}</h2>
                <ol class="mt-8 grid gap-6 lg:grid-cols-3">
                    @foreach ($servicios['forma_trabajo'] as $paso)
                        <li class="border-l-2 border-acento-100 pl-5">
                            <p class="text-xs font-bold text-acento-700">0{{ $loop->iteration }}</p>
                            <h3 class="mt-2 text-xl font-bold text-tinta-950">{{ $paso['titulo'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-tinta-600">{{ $paso['descripcion'] }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>

        <section id="consulta" class="scroll-mt-24 py-14 sm:py-16" aria-labelledby="titulo-consulta">
            <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 lg:grid-cols-[minmax(0,1.2fr)_minmax(0,0.8fr)] lg:gap-16 lg:px-10">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.conversemos') }}</p>
                    <h2 id="titulo-consulta" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_common.contame_que_necesitas_mejorar') }}</h2>
                    <p class="mt-4 max-w-2xl leading-7 text-tinta-600">{{ __('ui_services.podes_contarme_que_proceso_queres_resolver_que_herramientas') }}</p>
                    <a href="mailto:{{ $portafolio['contacto']['email'] }}" class="hero-accion mt-6 inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">{{ __('ui_common.escribirme_por_email') }}</a>
                    <p class="mt-3 break-all text-sm text-tinta-600">{{ $portafolio['contacto']['email'] }}</p>
                    <a href="{{ $portafolio['contacto']['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="mt-3 inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">{{ __('ui_common.contactar_por_linkedin') }} <span class="sr-only">{{ __('ui_common.abre_en_una_pestana_nueva') }}</span></a>
                </div>
                <aside class="rounded-2xl border border-slate-200 bg-slate-50 p-6 sm:p-8" aria-labelledby="titulo-equipo">
                    <h3 id="titulo-equipo" class="text-xl font-bold text-tinta-950">{{ __('ui_services.buscas_sumar_un_desarrollador_a_tu_equipo') }}</h3>
                    <p class="mt-3 text-sm leading-7 text-tinta-600">{{ __('ui_services.tambien_podes_conocer_mi_recorrido_profesional_y_consultar') }}</p>
                    <div class="mt-4 flex flex-col items-start gap-2">
                        <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}#experiencia" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">{{ __('ui_common.ver_experiencia_profesional') }}</a>
                        @if ($cvDisponible)
                            <a href="{{ asset($portafolio['cv']['archivo']) }}" download="{{ $portafolio['cv']['nombre_descarga'] }}" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">{{ __('ui_common.descargar_cv') }}</a>
                        @else
                            <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}#cv" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">{{ __('ui_common.consultar_disponibilidad_del_cv') }}</a>
                        @endif
                        <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}#proyectos" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">{{ __('ui_common.ver_otros_proyectos') }}</a>
                    </div>
                </aside>
            </div>
        </section>
    </main>
    @include('portafolio.parciales.footer')
@endsection
