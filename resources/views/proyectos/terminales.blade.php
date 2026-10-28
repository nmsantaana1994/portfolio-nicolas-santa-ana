@extends('layouts.portafolio')

@section('contenido')
    @php($caso = $portafolio['caso_terminales'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1">
        <section class="fondo-hero border-b border-slate-200 py-10 sm:py-16" aria-labelledby="titulo-terminales">
            <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 lg:grid-cols-[minmax(0,1.2fr)_minmax(0,1fr)] lg:items-center lg:gap-12 lg:px-10">
                <div>
                    <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}#proyectos" class="inline-flex min-h-11 items-center gap-2 rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) {{ __('ui_common.volver_a_los_proyectos') }}</a>
                    <p class="mt-6 text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Terminales + Agente Terminales</p>
                    <h1 id="titulo-terminales" class="mt-4 text-4xl leading-tight font-bold tracking-tight text-tinta-950 sm:text-5xl xl:text-6xl">{{ $caso['titulo'] }}</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-tinta-600">{{ $caso['presentacion'] }}</p>
                    <p class="mt-5 text-sm font-semibold text-acento-700">{{ __('ui_cases.desarrollo_integral_de_ambos_sistemas_desde_cero') }}</p>
                    <a href="#funcionamiento" class="hero-accion mt-7 inline-flex min-h-12 items-center gap-2 rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">{{ __('ui_common.ver_el_recorrido') }} @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                </div>
                @include('proyectos.partials.terminal-demo')
            </div>
        </section>

        <section class="py-14 sm:py-20" aria-labelledby="titulo-problema">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.la_necesidad_operativa') }}</p>
                <h2 id="titulo-problema" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_cases.atender_en_el_lugar_mantener_la_informacion_conectada') }}</h2>
                <dl class="mt-8 grid gap-8 md:grid-cols-2 md:gap-12">
                    <div><dt class="font-bold text-tinta-950">{{ __('ui_common.el_problema') }}</dt><dd class="mt-3 leading-7 text-tinta-600">{{ $caso['problema'] }}</dd></div>
                    <div><dt class="font-bold text-tinta-950">{{ __('ui_common.la_solucion_que_desarrolle') }}</dt><dd class="mt-3 leading-7 text-tinta-600">{{ $caso['solucion'] }}</dd></div>
                </dl>
                <div id="participacion" class="mt-10 scroll-mt-24 border-l-4 border-acento-700 pl-5 sm:pl-7" aria-labelledby="titulo-participacion">
                    <h3 id="titulo-participacion" class="text-lg font-bold text-tinta-950">{{ __('ui_common.mi_responsabilidad') }}</h3>
                    <p class="mt-3 max-w-3xl text-lg leading-8 text-tinta-700">{{ $caso['participacion'] }}</p>
                </div>
            </div>
        </section>

        <section id="funcionamiento" class="scroll-mt-24 border-y border-slate-200 bg-superficie py-14 sm:py-20" aria-labelledby="titulo-funcionamiento">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.como_funciona') }}</p>
                <h2 id="titulo-funcionamiento" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_cases.una_operacion_del_registro_a_la_sincronizacion') }}</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">{{ __('ui_cases.el_recorrido_combina_identificacion_reglas_y_seguimiento_la') }}</p>
                <ol class="mt-10 grid gap-x-8 gap-y-9 md:grid-cols-3 xl:grid-cols-5" data-recorrido-terminales>
                    @foreach ($caso['recorrido'] as $paso)
                        <li class="min-w-0 border-t border-slate-300 pt-5">
                            <div class="flex items-center justify-between gap-3 text-acento-700">
                                @include('proyectos.partials.icono-terminales', ['tipo' => $paso['icono']])
                                <span class="text-xs font-bold" aria-hidden="true">0{{ $loop->iteration }}</span>
                            </div>
                            <h3 class="mt-4 text-lg font-bold leading-6 text-tinta-950">{{ $paso['titulo'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-tinta-600">{{ $paso['descripcion'] }}</p>
                        </li>
                    @endforeach
                </ol>
                <div class="mt-10 border-t border-slate-200 pt-6">
                    <p class="max-w-3xl text-sm leading-7 text-tinta-600"><strong class="font-semibold text-tinta-950">{{ __('ui_cases.registrar_no_es_lo_mismo_que_sincronizar') }}</strong> {{ __('ui_cases.conservar_el_estado_permite_saber_que_se_resolvio') }}</p>
                </div>
            </div>
        </section>

        <section class="py-14 sm:py-20" aria-labelledby="titulo-capacidades">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-capacidades" class="max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_cases.un_producto_que_conecta_distintas_capas_del_software') }}</h2>
                <div class="mt-8 grid gap-8 md:grid-cols-3">
                    @foreach ($caso['capacidades'] as $capacidad)
                        <div><h3 class="font-bold text-tinta-950">{{ $capacidad['titulo'] }}</h3><p class="mt-3 text-sm leading-7 text-tinta-600">{{ $capacidad['descripcion'] }}</p></div>
                    @endforeach
                </div>
                <p class="mt-8 max-w-3xl leading-7 text-tinta-600">{{ __('ui_cases.la_persistencia_local_los_identificadores_y_estados_los') }}</p>
                <details class="group mt-8 rounded-2xl border border-slate-200 bg-white" data-detalle-terminales>
                    <summary class="cursor-pointer rounded-2xl px-5 py-5 font-semibold text-acento-700">{{ __('ui_cases.como_se_conectan_y_recuperan_las_operaciones') }}</summary>
                    <div class="border-t border-slate-200 p-5 sm:p-8">
                        <figure aria-labelledby="flujo-terminales">
                            <ol class="grid gap-6 md:grid-cols-3" data-flujo-terminales>
                                @foreach ($caso['nodos'] as $nodo)
                                    <li class="min-w-0 border-l-2 border-acento-100 pl-4"><h3 class="font-bold text-tinta-950">{{ \App\Support\PortfolioContent::label($nodo['nombre']) }}</h3><p class="mt-2 text-sm leading-6 text-tinta-600">{{ $nodo['detalle'] }}</p><p class="mt-3 text-sm font-semibold text-acento-700">{{ $nodo['tecnologia'] }}</p></li>
                                @endforeach
                            </ol>
                            <figcaption id="flujo-terminales" class="mt-5 text-xs leading-6 text-tinta-600">{{ __('ui_cases.relacion_conceptual_terminal_operativa_agente_local_sistema_central') }}</figcaption>
                        </figure>
                        <dl class="mt-8 grid gap-6 border-t border-slate-200 pt-6 md:grid-cols-2" data-calidad-terminales>
                            @foreach ($caso['calidad'] as $titulo => $descripcion)
                                <div><dt class="font-bold text-tinta-950">{{ \App\Support\PortfolioContent::label($titulo) }}</dt><dd class="mt-2 text-sm leading-7 text-tinta-600">{{ $descripcion }}</dd></div>
                            @endforeach
                        </dl>
                    </div>
                </details>
                <aside id="estado" class="mt-6 scroll-mt-24 text-sm leading-7 text-tinta-600" aria-label="{{ __('ui_common.evolucion_en_laboratorio') }}"><strong class="font-semibold text-tinta-950">{{ __('ui_common.proxima_evolucion') }}</strong> {{ $caso['evolucion'] }}</aside>
            </div>
        </section>

        <section id="contactar" class="scroll-mt-24 border-t border-slate-200 bg-superficie py-14 sm:py-16" aria-labelledby="titulo-contactar">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-contactar" class="max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_cases.tu_operacion_necesita_conectar_sistemas') }}</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">{{ __('ui_cases.podemos_conversar_sobre_una_aplicacion_una_integracion_o') }}</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="mailto:{{ $portafolio['contacto']['email'] }}" class="hero-accion inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">{{ __('ui_common.contactar_por_email') }}</a>
                    <a href="{{ \App\Support\PortfolioLocale::route('servicios', [], false) }}" class="hero-accion inline-flex min-h-12 items-center rounded-lg border border-slate-300 px-5 py-3 font-semibold text-tinta-700 hover:bg-acento-50">{{ __('ui_common.conocer_mis_servicios') }}</a>
                    <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}#proyectos" class="inline-flex min-h-12 items-center rounded-md px-3 font-semibold text-acento-700 underline underline-offset-4">{{ __('ui_common.volver_a_los_proyectos') }}</a>
                </div>
            </div>
        </section>
    </main>
    @include('portafolio.parciales.footer')
@endsection
