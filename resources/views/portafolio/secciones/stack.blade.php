<details id="stack" class="group mt-8 scroll-mt-24 rounded-2xl border border-slate-200 bg-white">
    <summary class="cursor-pointer rounded-2xl px-6 py-5 font-bold text-tinta-950">
        {{ __('ui_common.stack_y_herramientas_utilizadas') }}
    </summary>
    <div class="border-t border-slate-200 p-6">
        <p class="max-w-3xl leading-7 text-tinta-600">{{ __('ui_home.tecnologias_y_herramientas_aplicadas_en_los_contextos_de') }}</p>
        <div class="mt-6 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($portafolio['stack'] as $categoria => $tecnologias)
                <article class="rounded-xl border border-slate-200 bg-superficie p-5">
                    <h3 class="text-lg font-bold text-tinta-950">{{ \App\Support\PortfolioContent::label($categoria) }}</h3>
                    <ul class="mt-4 flex flex-wrap gap-2" aria-label="{{ __('ui_common.tecnologias_de_name', ['name' => \App\Support\PortfolioContent::label($categoria)]) }}">
                        @foreach ($tecnologias as $tecnologia)
                            <li class="rounded-md border border-slate-200 bg-white px-3 py-1.5 text-sm text-tinta-700">{{ \App\Support\PortfolioContent::label($tecnologia) }}</li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</details>
