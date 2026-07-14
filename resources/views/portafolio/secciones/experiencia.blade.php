<section id="experiencia" class="scroll-mt-24 bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-acento-700">Experiencia</p>
            <h2 class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Experiencia aplicada a sistemas en producción</h2>
            <p class="mt-4 text-lg leading-8 text-tinta-600">Una síntesis de roles y contextos donde combiné desarrollo, soporte y comprensión del negocio.</p>
        </div>

        <ol class="mt-12 border-l border-slate-200">
            @foreach ($portafolio['experiencias'] as $experiencia)
                <li class="relative pb-10 pl-7 last:pb-0 sm:pl-10">
                    <span class="absolute -left-1.5 top-2 size-3 rounded-full border-2 border-white bg-acento-600 ring-4 ring-acento-50" aria-hidden="true"></span>
                    <article class="grid gap-3 lg:grid-cols-[18rem_1fr] lg:gap-12">
                        <div>
                            <h3 class="text-xl font-bold text-tinta-950">{{ $experiencia['empresa'] }}</h3>
                            <p class="mt-1 text-sm font-semibold text-acento-700">{{ $experiencia['puesto'] }}</p>
                        </div>
                        <p class="leading-7 text-tinta-600">{{ $experiencia['resumen'] }}</p>
                    </article>
                </li>
            @endforeach
        </ol>
    </div>
</section>
