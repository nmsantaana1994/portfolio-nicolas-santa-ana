@extends('layouts.portafolio')

@section('contenido')
    @php($caso = $portafolio['caso_plataformas_operativas'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1">
        <section class="fondo-hero border-b border-slate-200 py-8 sm:py-14" aria-labelledby="titulo-plataformas">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <a href="{{ route('inicio', [], false) }}#proyectos" class="inline-flex min-h-11 items-center gap-2 rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) Volver a los proyectos</a>
                <div class="mt-6 grid gap-6 lg:grid-cols-[minmax(0,1.3fr)_minmax(0,0.8fr)] lg:items-end lg:gap-16">
                    <div><p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">ZonalApp + CateringOnline</p><h1 id="titulo-plataformas" class="mt-4 text-4xl font-bold leading-tight tracking-tight text-tinta-950 sm:text-5xl xl:text-6xl">{{ $caso['titulo'] }}</h1></div>
                    <div><p class="text-lg leading-8 text-tinta-600">{{ $caso['presentacion'] }}</p><a href="#zonalapp" class="hero-accion mt-6 inline-flex min-h-12 items-center gap-2 rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">Explorar los casos @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a></div>
                </div>
                <nav class="mt-10 grid gap-5 border-t border-slate-300 pt-5 sm:grid-cols-2 sm:gap-10" aria-label="Experiencias del caso">
                    @foreach ($caso['experiencias'] as $experiencia)
                        <a href="#{{ $experiencia['id'] }}" class="flex min-h-12 items-center justify-between gap-4 rounded-md py-2 text-acento-700 hover:text-tinta-950"><span><span class="block text-xs font-semibold uppercase tracking-wide">{{ $experiencia['tipo'] }}</span><span class="mt-2 block text-xl font-bold">{{ $experiencia['nombre'] }}</span></span>@include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                    @endforeach
                </nav>
            </div>
        </section>

        @foreach ($caso['experiencias'] as $experiencia)
            <section id="{{ $experiencia['id'] }}" @class(['scroll-mt-24 border-b border-slate-200 py-14 sm:py-20', 'bg-superficie' => ! $loop->first]) aria-labelledby="titulo-{{ $experiencia['id'] }}">
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                    <div class="grid items-center gap-9 lg:grid-cols-2 lg:gap-16">
                        <div @class(['min-w-0', 'lg:order-2' => ! $loop->first])>
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">0{{ $loop->iteration }} · {{ $experiencia['tipo'] }}</p>
                            <p class="mt-3 text-lg font-semibold text-acento-700">{{ $experiencia['nombre'] }}</p>
                            <h2 id="titulo-{{ $experiencia['id'] }}" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ $experiencia['titulo'] }}</h2>
                            <p class="mt-5 leading-7 text-tinta-600">{{ $experiencia['descripcion'] }}</p>
                            <ul class="mt-5 space-y-3 text-sm leading-7 text-tinta-600">
                                @foreach ($experiencia['funciones'] as $funcion)
                                    <li class="flex items-start gap-2"><span class="mt-2.5 size-1.5 shrink-0 rounded-full bg-acento-700" aria-hidden="true"></span><span>{{ $funcion }}</span></li>
                                @endforeach
                            </ul>
                            <div class="mt-6 border-l-2 border-acento-700 pl-4"><h3 class="text-sm font-bold text-tinta-950">Mi participación</h3><p class="mt-2 text-sm leading-7 text-tinta-700">{{ $experiencia['participacion'] }}</p></div>
                        </div>
                        <div @class(['min-w-0', 'lg:order-1' => ! $loop->first])>
                            @include('proyectos.partials.'.$experiencia['id'].'-demo')
                        </div>
                    </div>
                    @if (isset($experiencia['recuperacion']))
                        <div class="mt-8 border-t border-slate-200 pt-5"><p class="max-w-3xl text-sm leading-7 text-tinta-600"><strong class="font-semibold text-tinta-950">Cuando un ajuste queda pendiente.</strong> {{ $experiencia['recuperacion'] }}</p></div>
                    @endif
                    <details class="group mt-8 rounded-2xl border border-slate-200 bg-white" data-tecnica-plataforma>
                        <summary class="cursor-pointer rounded-2xl px-5 py-5 font-semibold text-acento-700">Tecnologías y decisiones de {{ $experiencia['nombre'] }}</summary>
                        <dl class="grid gap-6 border-t border-slate-200 p-5 sm:p-8 md:grid-cols-3">
                            @foreach ($experiencia['tecnica'] as $titulo => $descripcion)
                                <div><dt class="font-bold text-tinta-950">{{ $titulo }}</dt><dd class="mt-3 text-sm leading-7 text-tinta-600">{{ $descripcion }}</dd></div>
                            @endforeach
                        </dl>
                    </details>
                </div>
            </section>
        @endforeach

        <section class="py-14 sm:py-16" aria-labelledby="titulo-capacidades">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Capacidades profesionales</p>
                <h2 id="titulo-capacidades" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Distintas formas de aportar al software de una empresa.</h2>
                <dl class="mt-8 grid gap-7 md:grid-cols-3">
                    @foreach ($caso['capacidades'] as $capacidad)
                        <div class="border-t border-slate-300 pt-5"><dt class="font-bold text-tinta-950">{{ $capacidad['titulo'] }}</dt><dd class="mt-3 text-sm leading-7 text-tinta-600">{{ $capacidad['descripcion'] }}</dd></div>
                    @endforeach
                </dl>
            </div>
        </section>

        <section id="contactar" class="scroll-mt-24 border-t border-slate-200 bg-superficie py-14 sm:py-16" aria-labelledby="titulo-contactar">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-contactar" class="max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">¿Tu equipo necesita una herramienta mejor conectada?</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">Podemos conversar sobre una plataforma interna, una interfaz operativa, pedidos digitales o mejoras de un sistema existente. También sobre una oportunidad para sumarme a tu equipo.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="mailto:{{ $portafolio['contacto']['email'] }}" class="hero-accion inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">Contactar por email</a>
                    <a href="{{ route('servicios', [], false) }}" class="hero-accion inline-flex min-h-12 items-center rounded-lg border border-slate-300 px-5 py-3 font-semibold text-tinta-700 hover:bg-acento-50">Conocer mis servicios</a>
                    <a href="{{ route('inicio', [], false) }}#proyectos" class="inline-flex min-h-12 items-center rounded-md px-3 font-semibold text-acento-700 underline underline-offset-4">Volver a los proyectos</a>
                </div>
            </div>
        </section>
    </main>
    @include('portafolio.parciales.footer')
@endsection
