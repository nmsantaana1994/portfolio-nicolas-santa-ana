@extends('layouts.portafolio')

@section('contenido')
    @php($caso = $portafolio['caso_sgm_healthy'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1">
        <section class="fondo-hero border-b border-slate-200 py-8 sm:py-14" aria-labelledby="titulo-sgm-healthy">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <a href="{{ \App\Support\PortfolioLocale::route('inicio', [], false) }}#proyectos" class="inline-flex min-h-11 items-center gap-2 rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) {{ __('ui_common.volver_a_los_proyectos') }}</a>
                <div class="mx-auto mt-5 max-w-4xl text-center sm:mt-8">
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.caso_profesional_sgm_healthy') }}</p>
                    <h1 id="titulo-sgm-healthy" class="mt-4 text-balance text-4xl font-bold leading-tight tracking-tight text-tinta-950 sm:text-5xl xl:text-6xl">{{ $caso['titulo'] }}</h1>
                    <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-tinta-600">{{ $caso['presentacion'] }}</p>
                    <a href="#recorrido" class="hero-accion mt-6 inline-flex min-h-12 items-center gap-2 rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">{{ __('ui_common.conocer_el_recorrido') }} @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                </div>
                @include('proyectos.partials.sgm-healthy-demo')
            </div>
        </section>

        <section class="py-14 sm:py-20" aria-labelledby="titulo-desafio">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.el_desafio') }}</p>
                <div class="mt-3 grid gap-6 lg:grid-cols-2 lg:gap-16">
                    <h2 id="titulo-desafio" class="max-w-2xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_cases.la_misma_informacion_para_necesidades_diferentes') }}</h2>
                    <div class="space-y-4 leading-7 text-tinta-600"><p>{{ $caso['problema'] }}</p><p>{{ $caso['solucion'] }}</p></div>
                </div>
                <div class="mt-10 grid gap-8 md:grid-cols-2 md:gap-12">
                    @foreach ($caso['aplicaciones'] as $aplicacion)
                        <article @class(['min-w-0 border-t-2 pt-6', 'border-acento-700' => $loop->first, 'border-slate-300' => ! $loop->first]) data-aplicacion="{{ $aplicacion['nombre'] }}">
                            <p class="text-xs font-bold uppercase tracking-wide text-acento-700">{{ $aplicacion['nombre'] }} · {{ $aplicacion['ambito'] }}</p>
                            <h3 class="mt-3 text-2xl font-bold tracking-tight text-tinta-950">{{ $aplicacion['titulo'] }}</h3>
                            <p class="mt-4 leading-7 text-tinta-600">{{ $aplicacion['descripcion'] }}</p>
                            <ul class="mt-5 space-y-3 text-sm leading-7 text-tinta-600">
                                @foreach ($aplicacion['funciones'] as $funcion)
                                    <li class="flex items-start gap-2"><span class="mt-2.5 size-1.5 shrink-0 rounded-full bg-acento-700" aria-hidden="true"></span><span>{{ $funcion }}</span></li>
                                @endforeach
                            </ul>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="recorrido" class="scroll-mt-24 border-y border-slate-200 bg-superficie py-14 sm:py-20" aria-labelledby="titulo-recorrido">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.como_se_relacionan') }}</p>
                <h2 id="titulo-recorrido" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_cases.del_trabajo_interno_a_la_consulta_cotidiana') }}</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">{{ __('ui_cases.sgm_administra_informacion_de_menus_recetas_y_contenido') }}</p>
                <ol class="mt-9" data-recorrido-sgm-healthy>
                    @foreach ($caso['recorrido'] as $paso)
                        <li class="grid grid-cols-[2rem_minmax(0,1fr)] gap-x-4 gap-y-2 border-t border-slate-200 py-6 sm:grid-cols-[3rem_minmax(0,0.9fr)_minmax(0,1.1fr)] sm:gap-x-8">
                            <span class="text-xl font-bold text-acento-700" aria-hidden="true">0{{ $loop->iteration }}</span>
                            <div><p class="text-xs font-semibold uppercase tracking-wide text-acento-700">{{ $paso['aplicacion'] }}</p><h3 class="mt-2 text-lg font-bold text-tinta-950">{{ $paso['titulo'] }}</h3></div>
                            <p class="col-start-2 text-sm leading-7 text-tinta-600 sm:col-start-auto">{{ $paso['descripcion'] }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>

        <section id="participacion" class="scroll-mt-24 py-14 sm:py-20" aria-labelledby="titulo-participacion">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ __('ui_common.mi_participacion') }}</p>
                <h2 id="titulo-participacion" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_cases.desarrollar_el_proceso_y_sus_dos_experiencias_de') }}</h2>
                <p class="mt-5 max-w-3xl text-lg leading-8 text-tinta-600">{{ $caso['participacion'] }}</p>
                <div class="mt-8 grid gap-8 md:grid-cols-3">
                    @foreach ($caso['capacidades'] as $capacidad)
                        <div><h3 class="font-bold text-tinta-950">{{ $capacidad['titulo'] }}</h3><p class="mt-3 text-sm leading-7 text-tinta-600">{{ $capacidad['descripcion'] }}</p></div>
                    @endforeach
                </div>
                <details class="group mt-9 rounded-2xl border border-slate-200 bg-white" data-tecnica-sgm-healthy>
                    <summary class="cursor-pointer rounded-2xl px-5 py-5 font-semibold text-acento-700">{{ __('ui_common.tecnologias_integracion_y_pruebas') }}</summary>
                    <dl class="grid gap-6 border-t border-slate-200 p-5 sm:p-8 md:grid-cols-2">
                        @foreach ($caso['tecnica'] as $titulo => $descripcion)
                            <div><dt class="font-bold text-tinta-950">{{ \App\Support\PortfolioContent::label($titulo) }}</dt><dd class="mt-3 text-sm leading-7 text-tinta-600">{{ $descripcion }}</dd></div>
                        @endforeach
                    </dl>
                </details>
            </div>
        </section>

        <section id="contactar" class="scroll-mt-24 border-t border-slate-200 bg-superficie py-14 sm:py-16" aria-labelledby="titulo-contactar">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-contactar" class="max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_cases.necesitas_conectar_procesos_y_personas') }}</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">{{ __('ui_cases.esta_experiencia_reune_sistemas_internos_aplicaciones_para_usuarios') }}</p>
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
