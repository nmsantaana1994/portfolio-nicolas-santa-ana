@extends('layouts.portafolio')

@section('contenido')
    @php($caso = $portafolio['caso_empresarial'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1">
        <section class="fondo-hero border-b border-slate-200 py-10 sm:py-16" aria-labelledby="titulo-caso">
            <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 lg:grid-cols-[minmax(0,1.3fr)_minmax(0,0.9fr)] lg:items-center lg:gap-16 lg:px-10">
                <div>
                    <a href="{{ route('inicio', [], false) }}#proyectos" class="inline-flex min-h-11 items-center text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) Volver a los proyectos</a>
                    <p class="mt-6 text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Experiencia profesional · Desarrollo empresarial</p>
                    <h1 id="titulo-caso" class="mt-4 text-4xl leading-tight font-bold tracking-tight text-tinta-950 sm:text-5xl xl:text-6xl">{{ $caso['titulo'] }}</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-tinta-600">{{ $caso['presentacion'] }}</p>
                    <a href="#centralfarm" class="hero-accion mt-7 inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">Conocer las experiencias @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                </div>
                <nav class="space-y-4" aria-label="Experiencias del caso empresarial">
                    @foreach ($caso['experiencias'] as $experiencia)
                        <a href="#{{ $experiencia['id'] }}" @class(['group block rounded-2xl border p-6 transition-colors motion-reduce:transition-none', 'border-blue-200 bg-white hover:border-acento-700' => $loop->first, 'border-tinta-950 bg-tinta-950 text-white hover:bg-tinta-900' => ! $loop->first])>
                            <span @class(['text-xs font-bold uppercase tracking-wide', 'text-acento-700' => $loop->first, 'text-blue-300' => ! $loop->first])>{{ $experiencia['tipo'] }}</span>
                            <span class="mt-2 block text-2xl font-bold tracking-tight">{{ $experiencia['nombre'] }} @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</span>
                            <span @class(['mt-2 block text-sm leading-6', 'text-tinta-600' => $loop->first, 'text-slate-300' => ! $loop->first])>{{ $experiencia['resumen'] }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>
        </section>

        @foreach ($caso['experiencias'] as $experiencia)
            <section id="{{ $experiencia['id'] }}" @class(['scroll-mt-24 border-b border-slate-200 py-14 sm:py-20', 'bg-white' => $loop->first, 'bg-slate-50' => ! $loop->first]) aria-labelledby="titulo-{{ $experiencia['id'] }}" data-experiencia>
                <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                    <div @class(['border-l-4 pl-5 sm:pl-6', 'border-acento-700' => $loop->first, 'border-tinta-950' => ! $loop->first])>
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">0{{ $loop->iteration }} · {{ $experiencia['tipo'] }}</p>
                        <h2 id="titulo-{{ $experiencia['id'] }}" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ $experiencia['nombre'] }}</h2>
                        <p class="mt-4 max-w-3xl text-lg leading-8 text-tinta-600">{{ $experiencia['contexto'] }}</p>
                    </div>
                    <div class="mt-8 grid gap-6 lg:grid-cols-2">
                        <article class="superficie-tarjeta rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                            <h3 class="text-lg font-bold text-tinta-950">El desafío</h3>
                            <p class="mt-3 leading-7 text-tinta-600">{{ $experiencia['desafio'] }}</p>
                        </article>
                        <article class="rounded-2xl border border-blue-100 bg-acento-50 p-6 sm:p-8">
                            <h3 class="text-lg font-bold text-tinta-950">Mi participación</h3>
                            <p class="mt-3 leading-7 text-tinta-700">{{ $experiencia['participacion'] }}</p>
                        </article>
                    </div>
                    <div class="mt-8 grid gap-6 lg:grid-cols-3">
                        @foreach ($experiencia['funcionalidades'] as $funcionalidad)
                            <div class="min-w-0">
                                <h3 class="text-lg font-bold text-tinta-950">{{ $funcionalidad['titulo'] }}</h3>
                                <p class="mt-3 text-sm leading-7 text-tinta-600">{{ $funcionalidad['descripcion'] }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-8 border-t border-slate-200 pt-6">
                        <h3 class="font-bold text-tinta-950">Resultado funcional</h3>
                        <p class="mt-3 max-w-4xl leading-7 text-tinta-600">{{ $experiencia['resultado'] }}</p>
                    </div>
                    <details class="group mt-6 rounded-2xl border border-slate-200 bg-white" data-evidencia-empresarial>
                        <summary class="cursor-pointer rounded-2xl px-5 py-5 font-semibold text-acento-700">Cómo está construida {{ $experiencia['nombre'] }}</summary>
                        <div class="border-t border-slate-200 p-5 sm:p-6">
                            <ul class="flex flex-wrap gap-2" aria-label="Tecnologías de {{ $experiencia['nombre'] }}">
                                @foreach ($experiencia['stack'] as $tecnologia)
                                    <li class="rounded-full bg-slate-50 px-3 py-2 text-xs font-semibold text-tinta-700">{{ $tecnologia }}</li>
                                @endforeach
                            </ul>
                            <dl class="mt-6 grid gap-5 md:grid-cols-2">
                                @foreach ($experiencia['practicas'] as $titulo => $descripcion)
                                    <div><dt class="font-bold text-tinta-950">{{ $titulo }}</dt><dd class="mt-2 text-sm leading-7 text-tinta-600">{{ $descripcion }}</dd></div>
                                @endforeach
                            </dl>
                        </div>
                    </details>
                </div>
            </section>
        @endforeach

        <section class="bg-tinta-950 py-14 text-white sm:py-16" aria-labelledby="titulo-capacidades">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-blue-300">Capacidades demostradas</p>
                <h2 id="titulo-capacidades" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight sm:text-4xl">Elegir cómo intervenir también es parte del desarrollo.</h2>
                <p class="mt-5 max-w-3xl leading-7 text-slate-300">Una reconstrucción permite diseñar una aplicación completa; un sistema heredado exige comprender lo que ya funciona. Son experiencias distintas, con una misma atención a los procesos y a quienes usan el software.</p>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    @foreach ($caso['capacidades'] as $capacidad)
                        <div class="rounded-2xl border border-white/15 bg-white/5 p-6">
                            <h3 class="text-xl font-bold">{{ $capacidad['titulo'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-300">{{ $capacidad['descripcion'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="contactar" class="scroll-mt-24 py-14 sm:py-16" aria-labelledby="titulo-contactar">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-contactar" class="max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">¿Necesitás construir o evolucionar una aplicación?</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">Podemos conversar sobre un proyecto freelance o una oportunidad para sumarme a tu equipo. El punto de partida es entender el proceso y definir qué necesita cambiar.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="mailto:{{ $portafolio['contacto']['email'] }}" class="hero-accion inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">Contactar por email</a>
                    <a href="{{ route('servicios', [], false) }}" class="hero-accion inline-flex min-h-12 items-center rounded-lg border border-slate-300 px-5 py-3 font-semibold text-tinta-700 hover:bg-acento-50">Conocer mis servicios</a>
                    @if ($cvDisponible)
                        <a href="{{ asset($portafolio['cv']['archivo']) }}" download="{{ $portafolio['cv']['nombre_descarga'] }}" class="inline-flex min-h-12 items-center px-3 font-semibold text-acento-700 underline underline-offset-4">Descargar CV</a>
                    @endif
                </div>
                <div class="mt-4 flex flex-wrap gap-x-6">
                    <a href="{{ route('inicio', [], false) }}#proyectos" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">Volver a los proyectos</a>
                    <a href="{{ route('inicio', [], false) }}#contacto" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">Otras formas de contacto</a>
                </div>
            </div>
        </section>
    </main>
    @include('portafolio.parciales.footer')
@endsection
