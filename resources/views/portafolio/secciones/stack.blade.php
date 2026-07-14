<section id="stack" class="scroll-mt-24 bg-tinta-950 py-20 text-white sm:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-blue-300">Stack técnico</p>
            <h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">Tecnologías para productos web mantenibles</h2>
            <p class="mt-4 text-lg leading-8 text-slate-300">Herramientas que utilizo para desarrollar y operar soluciones full stack en escenarios reales.</p>
        </div>

        <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($portafolio['stack'] as $categoria => $tecnologias)
                <article class="rounded-xl border border-slate-700 bg-tinta-900 p-6">
                    <h3 class="text-lg font-bold text-white">{{ $categoria }}</h3>
                    <ul class="mt-5 flex flex-wrap gap-2" aria-label="Tecnologías de {{ $categoria }}">
                        @foreach ($tecnologias as $tecnologia)
                            <li class="rounded-md border border-slate-600 bg-tinta-950 px-3 py-1.5 text-sm text-slate-200">{{ $tecnologia }}</li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>
