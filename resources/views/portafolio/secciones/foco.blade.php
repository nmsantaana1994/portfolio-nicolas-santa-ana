<section class="bg-superficie py-20 sm:py-24" aria-labelledby="titulo-foco">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-acento-700">Foco de valor</p>
            <h2 id="titulo-foco" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Aporte técnico de punta a punta</h2>
            <p class="mt-4 text-lg leading-8 text-tinta-600">Una mirada integral para construir, mantener y mejorar productos web que sostienen operaciones concretas.</p>
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
            @foreach ($portafolio['focos'] as $indice => $foco)
                <article class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    <span class="flex size-9 items-center justify-center rounded-lg bg-acento-50 text-sm font-bold text-acento-700" aria-hidden="true">{{ str_pad($indice + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="mt-5 font-bold text-tinta-950">{{ $foco['titulo'] }}</h3>
                    <p class="mt-3 text-sm leading-6 text-tinta-600">{{ $foco['descripcion'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
