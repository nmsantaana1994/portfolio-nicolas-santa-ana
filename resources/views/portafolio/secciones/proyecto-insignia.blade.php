@php
    $proyecto = $portafolio['proyecto_insignia'];
    $portada = $proyecto['escenas'][0];
@endphp

<section id="foco-finanzas" class="scroll-mt-24 overflow-hidden bg-tinta-950 py-14 text-white sm:py-16" aria-labelledby="titulo-foco-finanzas" data-galeria-foco>
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="grid gap-8 md:grid-cols-[minmax(0,1.15fr)_minmax(0,0.85fr)] md:items-center lg:gap-16">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-blue-300">Proyecto insignia</p>
                <p class="mt-5 inline-flex rounded-full border border-blue-300/30 bg-blue-400/10 px-3 py-1 text-xs font-bold uppercase tracking-[0.12em] text-blue-200">
                    {{ $proyecto['contexto'] }}
                </p>
                <h2 id="titulo-foco-finanzas" class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl">{{ $proyecto['nombre'] }}</h2>
                <p class="mt-3 text-xl font-semibold text-blue-100">{{ $proyecto['subtitulo'] }}</p>
                <p class="mt-5 text-lg leading-8 text-slate-300">Un producto propio para gestionar cuentas y movimientos, entender cuotas y vencimientos y planificar el mes.</p>
                <p class="mt-4 text-sm leading-6 text-slate-300">Desarrollé el producto de punta a punta: desde las reglas financieras hasta las pantallas y las pruebas. Actualmente está en beta privada.</p>
                <a href="{{ route('proyectos.foco-finanzas', [], false) }}" class="mt-6 inline-flex min-h-11 items-center gap-2 rounded-md px-1 text-sm font-semibold text-blue-200 underline decoration-blue-300/40 underline-offset-4 transition-colors hover:text-white motion-reduce:transition-none">
                    Ver caso completo @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])
                </a>
            </div>

            <figure class="mx-auto w-full max-w-sm rounded-2xl border border-white/10 bg-white/5 p-5 text-center sm:p-6">
                <div class="flex justify-center">
                    <img data-src="{{ asset('images/projects/foco/light/'.$portada['archivo']) }}" alt="{{ $portada['alt'] }}" width="390" height="844" loading="lazy" decoding="async" class="hidden max-h-[28rem] w-auto max-w-full rounded-xl" data-imagen-foco="light">
                    <img src="{{ asset('images/projects/foco/dark/'.$portada['archivo']) }}" alt="{{ $portada['alt'] }}" width="390" height="844" loading="lazy" decoding="async" class="max-h-[28rem] w-auto max-w-full rounded-xl" data-imagen-foco="dark">
                </div>
                <figcaption class="mt-4 text-sm leading-6 text-slate-300">{{ $portada['descripcion'] }}</figcaption>
                <p class="mt-2 text-xs leading-5 text-slate-400">Captura histórica · Escenario sintético del 17/07/2026 · Sin datos de usuarios</p>
            </figure>
        </div>

    </div>
</section>
