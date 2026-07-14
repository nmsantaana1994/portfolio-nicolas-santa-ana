<section id="inicio" class="fondo-hero rejilla-sutil scroll-mt-24 border-b border-slate-100">
    <div class="mx-auto grid min-h-[calc(100svh-73px)] max-w-7xl items-center gap-12 px-5 py-20 sm:px-8 md:py-28 lg:grid-cols-[minmax(0,1.25fr)_minmax(18rem,.75fr)] lg:px-10">
        <div class="max-w-4xl">
            <p class="mb-5 inline-flex items-center gap-2 rounded-full border border-acento-100 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.16em] text-acento-700 shadow-sm sm:text-sm">
                <span class="size-2 rounded-full bg-acento-600" aria-hidden="true"></span>
                Disponible para nuevos desafíos
            </p>
            <h1 class="text-balance text-4xl font-bold tracking-[-0.04em] text-tinta-950 sm:text-5xl lg:text-7xl">
                {{ $portafolio['persona']['nombre'] }}
            </h1>
            <p class="mt-5 text-xl font-semibold text-acento-700 sm:text-2xl lg:text-3xl">
                {{ $portafolio['persona']['titulo'] }}
            </p>
            <p class="mt-7 max-w-3xl text-pretty text-lg leading-8 text-tinta-600 sm:text-xl sm:leading-9">
                {{ $portafolio['persona']['presentacion'] }}
            </p>

            <div class="mt-9 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                <a href="{{ $cvDisponible ? asset($portafolio['cv']['archivo']) : '#cv' }}" @if ($cvDisponible) download="{{ $portafolio['cv']['nombre_descarga'] }}" @endif class="inline-flex min-h-12 items-center justify-center rounded-lg bg-tinta-950 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-tinta-900">
                    Ver CV
                </a>
                <a href="{{ $portafolio['contacto']['github'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex min-h-12 items-center justify-center rounded-lg border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-tinta-700 shadow-sm transition hover:border-acento-600 hover:text-acento-700">
                    Ver GitHub
                </a>
                <a href="#contacto" class="inline-flex min-h-12 items-center justify-center rounded-lg px-6 py-3 text-sm font-semibold text-acento-700 transition hover:bg-acento-50">
                    Contactar <span class="ml-2" aria-hidden="true">→</span>
                </a>
            </div>
        </div>

        <aside class="rounded-2xl border border-slate-200 bg-white/90 p-6 shadow-xl shadow-slate-900/5 sm:p-8" aria-label="Perfil técnico resumido">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-acento-700">Perfil técnico</p>
            <dl class="mt-6 space-y-5">
                <div>
                    <dt class="text-sm font-medium text-tinta-400">Especialidad</dt>
                    <dd class="mt-1 font-semibold text-tinta-950">Laravel · APIs REST · Sistemas de gestión</dd>
                </div>
                <div class="border-t border-slate-100 pt-5">
                    <dt class="text-sm font-medium text-tinta-400">Core stack</dt>
                    <dd class="mt-1 font-semibold text-tinta-950">PHP · JavaScript · MySQL · Blade</dd>
                </div>
                <div class="border-t border-slate-100 pt-5">
                    <dt class="text-sm font-medium text-tinta-400">Ubicación</dt>
                    <dd class="mt-1 font-semibold text-tinta-950">{{ $portafolio['persona']['ubicacion'] }}</dd>
                </div>
            </dl>
        </aside>
    </div>
</section>
