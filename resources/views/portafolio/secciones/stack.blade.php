<details id="stack" class="group mt-8 scroll-mt-24 rounded-2xl border border-slate-200 bg-white">
    <summary class="cursor-pointer rounded-2xl px-6 py-5 font-bold text-tinta-950">
        Stack y herramientas utilizadas
    </summary>
    <div class="border-t border-slate-200 p-6">
        <p class="max-w-3xl leading-7 text-tinta-600">Tecnologías y herramientas aplicadas en los contextos de trabajo presentados. En Foco Finanzas, producto propio, utilizo PostgreSQL, pruebas con PHPUnit y Playwright, integración continua con GitHub Actions y Docker para desarrollo local.</p>
        <div class="mt-6 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($portafolio['stack'] as $categoria => $tecnologias)
                <article class="rounded-xl border border-slate-200 bg-superficie p-5">
                    <h3 class="text-lg font-bold text-tinta-950">{{ $categoria }}</h3>
                    <ul class="mt-4 flex flex-wrap gap-2" aria-label="Tecnologías de {{ $categoria }}">
                        @foreach ($tecnologias as $tecnologia)
                            <li class="rounded-md border border-slate-200 bg-white px-3 py-1.5 text-sm text-tinta-700">{{ $tecnologia }}</li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</details>
