<section id="proyectos" class="scroll-mt-24 bg-superficie py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-acento-700">Proyectos destacados</p>
            <h2 class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Casos técnicos y desafíos resueltos</h2>
            <p class="mt-4 text-lg leading-8 text-tinta-600">Experiencias presentadas sin datos sensibles, enfocadas en el problema, la solución, el resultado y mi aporte.</p>
        </div>

        <div class="mt-12 grid gap-6 lg:grid-cols-2">
            @foreach ($portafolio['proyectos'] as $proyecto)
                <article class="flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">{{ $proyecto['contexto'] }}</p>
                    <h3 class="mt-3 text-xl font-bold text-tinta-950 sm:text-2xl">{{ $proyecto['nombre'] }}</h3>
                    <dl class="mt-7 space-y-5">
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">Problema</dt>
                            <dd class="mt-2 leading-7 text-tinta-600">{{ $proyecto['problema'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">Solución</dt>
                            <dd class="mt-2 leading-7 text-tinta-600">{{ $proyecto['solucion'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">Resultado</dt>
                            <dd class="mt-2 leading-7 text-tinta-600">{{ $proyecto['resultado'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">Responsabilidades</dt>
                            <dd class="mt-2 leading-7 text-tinta-600">{{ $proyecto['responsabilidades'] }}</dd>
                        </div>
                    </dl>
                    <ul class="mt-7 flex flex-wrap gap-2" aria-label="Stack utilizado">
                        @foreach ($proyecto['stack'] as $tecnologia)
                            <li class="rounded-full bg-acento-50 px-3 py-1 text-xs font-semibold text-acento-700">{{ $tecnologia }}</li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>
