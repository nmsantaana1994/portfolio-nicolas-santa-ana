@extends('layouts.portafolio')

@section('contenido')
    @php($caso = $portafolio['caso_terminales'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1">
        <section class="fondo-hero border-b border-slate-200 py-10 sm:py-16" aria-labelledby="titulo-terminales">
            <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-8 lg:grid-cols-[minmax(0,1.3fr)_minmax(0,0.9fr)] lg:items-center lg:gap-16 lg:px-10">
                <div>
                    <a href="{{ route('inicio', [], false) }}#proyectos" class="inline-flex min-h-11 items-center gap-2 rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) Volver a los proyectos</a>
                    <p class="mt-6 text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Caso profesional · Terminales + Agente</p>
                    <h1 id="titulo-terminales" class="mt-4 text-4xl leading-tight font-bold tracking-tight text-tinta-950 sm:text-5xl xl:text-6xl">{{ $caso['titulo'] }}</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-tinta-600">{{ $caso['presentacion'] }}</p>
                    <a href="#funcionamiento" class="hero-accion mt-7 inline-flex min-h-12 items-center gap-2 rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">Cómo funciona @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                </div>
                <figure class="superficie-tarjeta min-w-0 rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                    <p class="text-xs font-bold uppercase tracking-wide text-acento-700">Ejemplo ilustrativo</p>
                    <p class="mt-3 text-2xl font-bold tracking-tight text-tinta-950">Punto de atención Demo</p>
                    <dl class="mt-6 space-y-5 text-sm">
                        <div><dt class="text-tinta-600">Operación ficticia</dt><dd class="mt-1 font-semibold text-tinta-950">Registro de un consumo</dd></div>
                        <div class="border-t border-slate-200 pt-5"><dt class="text-tinta-600">En el equipo local</dt><dd class="mt-1 font-semibold text-tinta-950">Registro conservado</dd></div>
                        <div class="rounded-xl border border-blue-100 bg-acento-50 p-4"><dt class="font-semibold text-acento-700">Comunicación pendiente</dt><dd class="mt-2 leading-6 text-tinta-600">El registro local no implica que el sistema central ya lo haya recibido.</dd></div>
                    </dl>
                    <figcaption class="mt-5 text-xs leading-6 text-tinta-600">Representación conceptual con datos ficticios. No es una pantalla interna ni el estado de una terminal real.</figcaption>
                </figure>
            </div>
        </section>

        <section class="py-14 sm:py-16" aria-labelledby="titulo-problema">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Problema y solución</p>
                <h2 id="titulo-problema" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Registrar en el lugar. Administrar en conjunto.</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <article class="superficie-tarjeta rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                        <h3 class="text-lg font-bold text-tinta-950">El desafío operativo</h3>
                        <p class="mt-3 leading-7 text-tinta-600">{{ $caso['problema'] }}</p>
                    </article>
                    <article class="rounded-2xl border border-blue-100 bg-acento-50 p-6 sm:p-8">
                        <h3 class="text-lg font-bold text-tinta-950">Dos sistemas coordinados</h3>
                        <p class="mt-3 leading-7 text-tinta-600">{{ $caso['solucion'] }}</p>
                    </article>
                </div>
                <div class="mt-8 grid gap-6 md:grid-cols-3">
                    @foreach ($caso['capacidades'] as $capacidad)
                        <div class="min-w-0">
                            <h3 class="text-lg font-bold text-tinta-950">{{ $capacidad['titulo'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-tinta-600">{{ $capacidad['descripcion'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="funcionamiento" class="scroll-mt-24 border-y border-slate-200 bg-superficie py-14 sm:py-16" aria-labelledby="titulo-funcionamiento">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Continuidad con límites claros</p>
                <h2 id="titulo-funcionamiento" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">La conexión puede fallar. El estado no debería confundirse.</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">La persistencia local y la sincronización permiten acompañar una conexión limitada. No todas las operaciones pueden resolverse sin conexión: dependen de la información y las reglas disponibles en el equipo.</p>
                <figure class="mt-8" aria-labelledby="flujo-terminales">
                    <ol class="grid gap-8 md:grid-cols-3" data-flujo-terminales>
                        @foreach ($caso['nodos'] as $nodo)
                            <li class="superficie-tarjeta relative min-w-0 rounded-2xl border border-slate-200 bg-white p-6">
                                <span class="text-sm font-bold text-acento-700" aria-hidden="true">0{{ $loop->iteration }}</span>
                                <h3 class="mt-3 text-xl font-bold text-tinta-950">{{ $nodo['nombre'] }}</h3>
                                <p class="mt-3 text-sm leading-7 text-tinta-600">{{ $nodo['detalle'] }}</p>
                                <p class="mt-4 text-sm font-semibold text-acento-700">{{ $nodo['tecnologia'] }}</p>
                                @unless ($loop->last)
                                    <span class="absolute -bottom-7 left-1/2 rotate-90 text-acento-700 md:top-1/2 md:-right-7 md:bottom-auto md:left-auto md:rotate-0" aria-hidden="true">@include('portafolio.parciales.indicador-enlace')</span>
                                @endunless
                            </li>
                        @endforeach
                    </ol>
                    <figcaption id="flujo-terminales" class="mt-5 max-w-3xl text-xs leading-6 text-tinta-600">Flujo conceptual propio: Terminal operativa → Agente local → Sistema central. Las flechas representan la relación entre componentes, no una topología de red ni un protocolo real.</figcaption>
                </figure>
                <details class="group mt-8 rounded-2xl border border-slate-200 bg-white" data-detalle-terminales>
                    <summary class="cursor-pointer rounded-2xl px-5 py-5 font-semibold text-acento-700">Decisiones técnicas: persistencia, sincronización y mantenimiento</summary>
                    <div class="grid gap-6 border-t border-slate-200 p-5 sm:p-6 md:grid-cols-3">
                        @foreach ($caso['decisiones'] as $decision)
                            <div><h3 class="font-bold text-tinta-950">{{ $decision['titulo'] }}</h3><p class="mt-3 text-sm leading-7 text-tinta-600">{{ $decision['descripcion'] }}</p></div>
                        @endforeach
                    </div>
                </details>
            </div>
        </section>

        <section id="participacion" class="scroll-mt-24 py-14 sm:py-16" aria-labelledby="titulo-participacion">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Mi participación</p>
                <h2 id="titulo-participacion" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">De la plataforma central al agente local.</h2>
                <p class="mt-5 max-w-3xl text-lg leading-8 text-tinta-600">{{ $caso['participacion'] }}</p>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">El trabajo combina desarrollo de aplicaciones empresariales, integración de sistemas y mantenimiento de software que acompaña tareas operativas.</p>
            </div>
        </section>

        <section id="estado" class="scroll-mt-24 border-y border-slate-200 bg-superficie py-14 sm:py-16" aria-labelledby="titulo-estado">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-estado" class="max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Lo implementado y lo que sigue en evaluación.</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    @foreach ($caso['estados'] as $estado)
                        <article class="superficie-tarjeta rounded-2xl border border-slate-200 bg-white p-6"><h3 class="text-lg font-bold text-tinta-950">{{ $estado['titulo'] }}</h3><p class="mt-3 leading-7 text-tinta-600">{{ $estado['descripcion'] }}</p></article>
                    @endforeach
                </div>
                <details class="group mt-6 rounded-2xl border border-slate-200 bg-white" data-evidencia-terminales>
                    <summary class="cursor-pointer rounded-2xl px-5 py-5 font-semibold text-acento-700">Pruebas, validaciones históricas y pendientes de integración</summary>
                    <dl class="grid gap-6 border-t border-slate-200 p-5 sm:p-6 md:grid-cols-3">
                        @foreach ($caso['evidencia'] as $titulo => $descripcion)
                            <div><dt class="font-bold text-tinta-950">{{ $titulo }}</dt><dd class="mt-3 text-sm leading-7 text-tinta-600">{{ $descripcion }}</dd></div>
                        @endforeach
                    </dl>
                </details>
            </div>
        </section>

        <section id="contactar" class="scroll-mt-24 py-14 sm:py-16" aria-labelledby="titulo-contactar">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-contactar" class="max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">¿Tu operación necesita conectar sistemas?</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">Podemos conversar sobre una aplicación, una integración o una oportunidad para sumarme a tu equipo.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="mailto:{{ $portafolio['contacto']['email'] }}" class="hero-accion inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 py-3 font-semibold text-white hover:bg-tinta-950">Contactar por email</a>
                    <a href="{{ route('servicios', [], false) }}" class="hero-accion inline-flex min-h-12 items-center rounded-lg border border-slate-300 px-5 py-3 font-semibold text-tinta-700 hover:bg-acento-50">Conocer mis servicios</a>
                    <a href="{{ route('inicio', [], false) }}#proyectos" class="inline-flex min-h-12 items-center rounded-md px-3 font-semibold text-acento-700 underline underline-offset-4">Volver a los proyectos</a>
                </div>
                <p class="mt-6 max-w-3xl text-xs leading-6 text-tinta-600">Descripción funcional general. No se publican capturas empresariales, código privado, datos reales ni configuraciones internas. Las representaciones visuales son ilustrativas.</p>
            </div>
        </section>
    </main>
    @include('portafolio.parciales.footer')
@endsection
