@extends('layouts.portafolio')

@section('contenido')
    @php($servicios = $portafolio['servicios'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1">
        <section class="fondo-hero border-b border-slate-200 py-10 sm:py-16" aria-labelledby="titulo-servicios">
            <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,0.8fr)] lg:items-center lg:gap-16 lg:px-10">
                <div>
                    <a href="{{ route('inicio', [], false) }}" class="inline-flex min-h-11 items-center text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) Volver al portfolio</a>
                    <p class="mt-6 text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Servicios profesionales · Nicolás Santa Ana</p>
                    <h1 id="titulo-servicios" class="mt-4 max-w-3xl text-4xl leading-tight font-bold tracking-tight text-tinta-950 sm:text-5xl lg:text-6xl">{{ $servicios['titulo'] }}</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-tinta-600">{{ $servicios['presentacion'] }}</p>
                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="mailto:{{ $portafolio['contacto']['email'] }}" class="hero-accion inline-flex min-h-12 items-center justify-center rounded-lg bg-acento-700 px-5 py-3 text-sm font-semibold text-white hover:bg-tinta-950">Contame tu proyecto</a>
                        <a href="#capacidades" class="hero-accion inline-flex min-h-12 items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-tinta-950 hover:bg-acento-50">Explorar servicios @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                    </div>
                </div>
                <aside class="rounded-2xl bg-tinta-950 p-6 text-white sm:p-8" aria-labelledby="titulo-punto-partida">
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-blue-300">Un punto de partida concreto</p>
                    <h2 id="titulo-punto-partida" class="mt-3 text-2xl font-bold tracking-tight">¿Qué necesitás resolver?</h2>
                    <ul class="mt-5 space-y-4 text-sm leading-6 text-slate-200">
                        <li class="border-b border-white/15 pb-4">Organizar un proceso con una aplicación propia.</li>
                        <li class="border-b border-white/15 pb-4">Conectar herramientas que hoy trabajan por separado.</li>
                        <li>Mejorar una aplicación que ya forma parte de la operación.</li>
                    </ul>
                    <p class="mt-6 text-sm leading-6 text-slate-300">El alcance se define a partir de tu contexto y del software existente.</p>
                </aside>
            </div>
        </section>

        <section id="capacidades" class="scroll-mt-24 py-14 sm:py-16" aria-labelledby="titulo-capacidades">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Cómo puedo ayudarte</p>
                <h2 id="titulo-capacidades" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Construir lo que falta. Mejorar lo que existe.</h2>
                <p class="mt-4 max-w-2xl leading-7 text-tinta-600">Cuatro capacidades que se pueden combinar según las necesidades del proyecto.</p>
                <a href="{{ route('proyectos.soluciones-comerciales', [], false) }}" class="mt-4 inline-flex min-h-11 items-center gap-2 rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4 hover:text-tinta-950">Ver experiencia aplicada: Centralfarm y GlobalMed @include('portafolio.parciales.indicador-enlace')</a>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    @foreach ($servicios['capacidades'] as $capacidad)
                        <article class="superficie-tarjeta flex min-w-0 flex-col rounded-2xl border border-slate-200 bg-white p-6 sm:p-8" data-servicio>
                            <p class="text-sm font-bold text-acento-700" aria-hidden="true">0{{ $loop->iteration }}</p>
                            <h3 class="mt-3 text-2xl font-bold tracking-tight text-tinta-950">{{ $capacidad['titulo'] }}</h3>
                            <p class="mt-4 text-sm leading-7 text-tinta-600">{{ $capacidad['problema'] }}</p>
                            <p class="mt-3 leading-7 text-tinta-700">{{ $capacidad['solucion'] }}</p>
                            <div class="mt-6 border-t border-slate-200 pt-5">
                                <p class="text-xs font-bold uppercase tracking-wide text-tinta-400">Experiencia aplicada</p>
                                <p class="mt-2 text-sm leading-6 text-tinta-600">{{ $capacidad['evidencia'] }}</p>
                            </div>
                            <a href="{{ route($capacidad['ruta'], [], false) }}#{{ $capacidad['ancla'] }}" class="mt-auto inline-flex min-h-11 items-center gap-2 self-start rounded-md pt-5 text-sm font-semibold text-acento-700 underline underline-offset-4 hover:text-tinta-950">{{ $capacidad['enlace'] }} @include('portafolio.parciales.indicador-enlace')</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="border-y border-slate-200 bg-slate-50 py-14 sm:py-16" aria-labelledby="titulo-forma-trabajo">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Forma de trabajo</p>
                <h2 id="titulo-forma-trabajo" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Primero el problema, después la solución.</h2>
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
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Conversemos</p>
                    <h2 id="titulo-consulta" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Contame qué necesitás mejorar.</h2>
                    <p class="mt-4 max-w-2xl leading-7 text-tinta-600">Podés contarme qué proceso querés resolver, qué herramientas usás y qué cambio estás buscando. A partir de ese contexto podemos conversar sobre el alcance.</p>
                    <a href="mailto:{{ $portafolio['contacto']['email'] }}" class="hero-accion mt-6 inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">Escribirme por email</a>
                    <p class="mt-3 break-all text-sm text-tinta-600">{{ $portafolio['contacto']['email'] }}</p>
                    <a href="{{ $portafolio['contacto']['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="mt-3 inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">Contactar por LinkedIn <span class="sr-only">(abre en una pestaña nueva)</span></a>
                </div>
                <aside class="rounded-2xl border border-slate-200 bg-slate-50 p-6 sm:p-8" aria-labelledby="titulo-equipo">
                    <h3 id="titulo-equipo" class="text-xl font-bold text-tinta-950">¿Buscás sumar un desarrollador a tu equipo?</h3>
                    <p class="mt-3 text-sm leading-7 text-tinta-600">También podés conocer mi recorrido profesional y consultar mi CV.</p>
                    <div class="mt-4 flex flex-col items-start gap-2">
                        <a href="{{ route('inicio', [], false) }}#experiencia" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">Ver experiencia profesional</a>
                        @if ($cvDisponible)
                            <a href="{{ asset($portafolio['cv']['archivo']) }}" download="{{ $portafolio['cv']['nombre_descarga'] }}" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">Descargar CV</a>
                        @else
                            <a href="{{ route('inicio', [], false) }}#cv" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">Consultar disponibilidad del CV</a>
                        @endif
                        <a href="{{ route('inicio', [], false) }}#proyectos" class="inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">Ver otros proyectos</a>
                    </div>
                </aside>
            </div>
        </section>
    </main>
    @include('portafolio.parciales.footer')
@endsection
