<section id="proyectos" class="scroll-mt-24 bg-superficie py-14 sm:py-16">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-acento-700">Casos profesionales</p>
            <h2 class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Software al servicio de la operación</h2>
            <p class="mt-4 text-lg leading-8 text-tinta-600">Gestión, integraciones, trabajo offline y evolución de sistemas. Estos casos describen mi aporte sin publicar pantallas ni información interna.</p>
            <a href="{{ route('proyectos.soluciones-comerciales', [], false) }}" class="mt-4 inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4 hover:text-tinta-950">Centralfarm y GlobalMed: ver caso empresarial @include('portafolio.parciales.indicador-enlace')</a>
        </div>

        <div class="mt-8 grid gap-6 md:grid-cols-2">
            @foreach ($portafolio['proyectos'] as $proyecto)
                <article class="superficie-tarjeta flex flex-col rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
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
                            <dt class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">Mi participación</dt>
                            <dd class="mt-2 leading-7 text-tinta-600">{{ $proyecto['responsabilidades'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">Resultado</dt>
                            <dd class="mt-2 leading-7 text-tinta-600">{{ $proyecto['resultado'] }}</dd>
                        </div>
                    </dl>
                    <details class="group mt-6 border-t border-slate-200 pt-2">
                        <summary class="cursor-pointer rounded-md py-3 text-sm font-semibold text-acento-700">Tecnologías utilizadas</summary>
                        <ul class="mt-4 flex flex-wrap gap-2 pb-2" aria-label="Stack utilizado">
                            @foreach ($proyecto['stack'] as $tecnologia)
                                <li class="rounded-full bg-acento-50 px-3 py-1 text-xs font-semibold text-acento-700">{{ $tecnologia }}</li>
                            @endforeach
                        </ul>
                    </details>
                </article>
            @endforeach
        </div>
    </div>
</section>
