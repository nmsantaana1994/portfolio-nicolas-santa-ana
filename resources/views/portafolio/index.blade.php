@extends('layouts.portafolio')

@section('contenido')
    <header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/95 backdrop-blur">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-8 lg:px-10" aria-label="Navegación principal">
            <a href="#inicio" class="text-sm font-bold tracking-tight text-tinta-950 sm:text-base" aria-label="Nicolás Santa Ana — volver al inicio">
                Nicolás Santa Ana
            </a>

            <div class="hidden items-center gap-7 md:flex">
                @foreach ($portafolio['navegacion'] as $item)
                    <a href="#{{ $item['ancla'] }}" class="text-sm font-medium text-tinta-600 transition hover:text-acento-700">
                        {{ $item['etiqueta'] }}
                    </a>
                @endforeach
            </div>

            <button type="button" class="inline-flex size-10 items-center justify-center rounded-lg border border-slate-300 text-tinta-700 md:hidden" aria-expanded="false" aria-controls="menu-movil" aria-label="Abrir navegación" data-menu-boton>
                <svg aria-hidden="true" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>
        </nav>

        <div id="menu-movil" class="hidden border-t border-slate-200 bg-white px-5 py-4 md:hidden" data-menu-movil>
            <div class="mx-auto flex max-w-7xl flex-col gap-1">
                @foreach ($portafolio['navegacion'] as $item)
                    <a href="#{{ $item['ancla'] }}" class="rounded-lg px-3 py-3 text-sm font-medium text-tinta-700 hover:bg-acento-50 hover:text-acento-700">
                        {{ $item['etiqueta'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>

    <main id="contenido">
        @include('portafolio.secciones.inicio')
        @include('portafolio.secciones.sobre-mi')
        @include('portafolio.secciones.foco')
        @include('portafolio.secciones.stack')
        @include('portafolio.secciones.experiencia')
        @include('portafolio.secciones.proyectos')
        @include('portafolio.secciones.cv')
        @include('portafolio.secciones.contacto')
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-8 text-sm text-tinta-600 sm:px-8 md:flex-row md:items-center md:justify-between lg:px-10">
            <p>&copy; {{ now()->year }} {{ $portafolio['persona']['nombre'] }}.</p>
            <p>Desarrollado con Laravel, Blade y Tailwind CSS.</p>
        </div>
    </footer>
@endsection
