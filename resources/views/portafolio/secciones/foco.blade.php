<section id="competencias" class="scroll-mt-24 bg-superficie py-14 sm:py-16" aria-labelledby="titulo-foco">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-acento-700">Competencias y forma de trabajo</p>
            <h2 id="titulo-foco" class="mt-3 scroll-mt-24 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Del problema a la evolución del sistema</h2>
            <p class="mt-4 text-lg leading-8 text-tinta-600">Análisis, implementación y acompañamiento, tanto en equipos de producto como en proyectos freelance.</p>
        </div>

        <div class="mt-8 grid gap-4 md:grid-cols-3">
            @foreach ($portafolio['focos'] as $indice => $foco)
                <article class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    <span class="flex size-9 items-center justify-center rounded-lg bg-acento-50 text-sm font-bold text-acento-700" aria-hidden="true">{{ str_pad($indice + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3 class="mt-5 font-bold text-tinta-950">{{ $foco['titulo'] }}</h3>
                    <p class="mt-3 text-sm leading-6 text-tinta-600">{{ $foco['descripcion'] }}</p>
                </article>
            @endforeach
        </div>

        @include('portafolio.secciones.stack')
    </div>
</section>
