@extends('layouts.portafolio')

@section('contenido')
    @php($caso = $portafolio['caso_terminales'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1">
        <section class="fondo-hero border-b border-slate-200 py-10 sm:py-16" aria-labelledby="titulo-terminales">
            <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 lg:grid-cols-[minmax(0,1.2fr)_minmax(0,1fr)] lg:items-center lg:gap-12 lg:px-10">
                <div>
                    <a href="{{ route('inicio', [], false) }}#proyectos" class="inline-flex min-h-11 items-center gap-2 rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) Volver a los proyectos</a>
                    <p class="mt-6 text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Terminales + Agente Terminales</p>
                    <h1 id="titulo-terminales" class="mt-4 text-4xl leading-tight font-bold tracking-tight text-tinta-950 sm:text-5xl xl:text-6xl">{{ $caso['titulo'] }}</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-tinta-600">{{ $caso['presentacion'] }}</p>
                    <p class="mt-5 text-sm font-semibold text-acento-700">Desarrollo integral de ambos sistemas, desde cero.</p>
                    <a href="#funcionamiento" class="hero-accion mt-7 inline-flex min-h-12 items-center gap-2 rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">Ver el recorrido @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                </div>
                @include('proyectos.partials.terminal-demo')
            </div>
        </section>

        <section class="py-14 sm:py-20" aria-labelledby="titulo-problema">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">La necesidad operativa</p>
                <h2 id="titulo-problema" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Atender en el lugar. Mantener la información conectada.</h2>
                <dl class="mt-8 grid gap-8 md:grid-cols-2 md:gap-12">
                    <div><dt class="font-bold text-tinta-950">El problema</dt><dd class="mt-3 leading-7 text-tinta-600">{{ $caso['problema'] }}</dd></div>
                    <div><dt class="font-bold text-tinta-950">La solución que desarrollé</dt><dd class="mt-3 leading-7 text-tinta-600">{{ $caso['solucion'] }}</dd></div>
                </dl>
                <div id="participacion" class="mt-10 scroll-mt-24 border-l-4 border-acento-700 pl-5 sm:pl-7" aria-labelledby="titulo-participacion">
                    <h3 id="titulo-participacion" class="text-lg font-bold text-tinta-950">Mi responsabilidad</h3>
                    <p class="mt-3 max-w-3xl text-lg leading-8 text-tinta-700">{{ $caso['participacion'] }}</p>
                    <p class="mt-3 text-sm leading-6 text-tinta-600">{{ $caso['colaboracion'] }}</p>
                </div>
            </div>
        </section>

        <section id="funcionamiento" class="scroll-mt-24 border-y border-slate-200 bg-superficie py-14 sm:py-20" aria-labelledby="titulo-funcionamiento">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Cómo funciona</p>
                <h2 id="titulo-funcionamiento" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Una operación, del registro a la sincronización.</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">El recorrido combina identificación, reglas y seguimiento. La continuidad sin conexión depende de la información disponible localmente; no todos los circuitos pueden operar offline.</p>
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
                    <p class="max-w-3xl text-sm leading-7 text-tinta-600"><strong class="font-semibold text-tinta-950">Registrar no es lo mismo que sincronizar.</strong> Conservar el estado permite saber qué se resolvió en el equipo y qué sigue pendiente de comunicar.</p>
                </div>
            </div>
        </section>

        <section class="py-14 sm:py-20" aria-labelledby="titulo-capacidades">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-capacidades" class="max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Un producto que conecta distintas capas del software.</h2>
                <div class="mt-8 grid gap-8 md:grid-cols-3">
                    @foreach ($caso['capacidades'] as $capacidad)
                        <div><h3 class="font-bold text-tinta-950">{{ $capacidad['titulo'] }}</h3><p class="mt-3 text-sm leading-7 text-tinta-600">{{ $capacidad['descripcion'] }}</p></div>
                    @endforeach
                </div>
                <p class="mt-8 max-w-3xl leading-7 text-tinta-600">La persistencia local, los identificadores y estados, los reintentos y las pruebas específicas acompañan la recuperación y el seguimiento de las operaciones.</p>
                <details class="group mt-8 rounded-2xl border border-slate-200 bg-white" data-detalle-terminales>
                    <summary class="cursor-pointer rounded-2xl px-5 py-5 font-semibold text-acento-700">Arquitectura y decisiones de confiabilidad</summary>
                    <div class="border-t border-slate-200 p-5 sm:p-8">
                        <figure aria-labelledby="flujo-terminales">
                            <ol class="grid gap-6 md:grid-cols-3" data-flujo-terminales>
                                @foreach ($caso['nodos'] as $nodo)
                                    <li class="min-w-0 border-l-2 border-acento-100 pl-4"><h3 class="font-bold text-tinta-950">{{ $nodo['nombre'] }}</h3><p class="mt-2 text-sm leading-6 text-tinta-600">{{ $nodo['detalle'] }}</p><p class="mt-3 text-sm font-semibold text-acento-700">{{ $nodo['tecnologia'] }}</p></li>
                                @endforeach
                            </ol>
                            <figcaption id="flujo-terminales" class="mt-5 text-xs leading-6 text-tinta-600">Relación conceptual: Terminal operativa → Agente local → Sistema central.</figcaption>
                        </figure>
                        <dl class="mt-8 grid gap-6 border-t border-slate-200 pt-6 md:grid-cols-2" data-calidad-terminales>
                            @foreach ($caso['calidad'] as $titulo => $descripcion)
                                <div><dt class="font-bold text-tinta-950">{{ $titulo }}</dt><dd class="mt-2 text-sm leading-7 text-tinta-600">{{ $descripcion }}</dd></div>
                            @endforeach
                        </dl>
                    </div>
                </details>
                <aside id="estado" class="mt-6 scroll-mt-24 text-sm leading-7 text-tinta-600" aria-label="Evolución en laboratorio"><strong class="font-semibold text-tinta-950">Próxima evolución.</strong> {{ $caso['evolucion'] }}</aside>
            </div>
        </section>

        <section id="contactar" class="scroll-mt-24 border-t border-slate-200 bg-superficie py-14 sm:py-16" aria-labelledby="titulo-contactar">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-contactar" class="max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">¿Tu operación necesita conectar sistemas?</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">Podemos conversar sobre una aplicación, una integración o una oportunidad para sumarme a tu equipo.</p>
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
