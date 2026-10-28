<section id="proyectos" class="scroll-mt-24 bg-superficie py-14 sm:py-16" aria-labelledby="titulo-proyectos">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-acento-700">{{ __('ui_common.casos_profesionales') }}</p>
            <h2 id="titulo-proyectos" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">{{ __('ui_home.distintos_desafios_software_para_cada_necesidad') }}</h2>
            <p class="mt-4 text-lg leading-8 text-tinta-600">{{ __('ui_home.aplicaciones_empresariales_integracion_y_continuidad_operativa_conoce_que') }}</p>
        </div>

        <div class="mt-8 grid gap-5 md:grid-cols-2 lg:gap-6">
            @foreach ($portafolio['proyectos'] as $proyecto)
                <article class="proyecto-resumen superficie-tarjeta flex min-w-0 flex-col border border-slate-200 bg-white p-6 sm:p-8">
                    <div class="flex items-start gap-4">
                        <span class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-acento-50 text-acento-700" aria-hidden="true">
                            @include('portafolio.parciales.icono-proyecto', ['icono' => $proyecto['icono']])
                        </span>
                        <div class="min-w-0">
                            <p class="text-xs font-bold uppercase leading-5 tracking-[0.1em] text-acento-700">{{ $proyecto['contexto'] }}</p>
                            <h3 class="mt-2 text-xl font-bold tracking-tight text-tinta-950 sm:text-2xl">{{ $proyecto['nombre'] }}</h3>
                        </div>
                    </div>
                    <p class="mt-5 leading-7 text-tinta-600">{{ $proyecto['resumen'] }}</p>
                    <p class="mt-4 text-sm font-medium leading-6 text-tinta-600">{{ $proyecto['distintivo'] }}</p>
                    <div class="mt-auto pt-5">
                        <a href="{{ \App\Support\PortfolioLocale::route($proyecto['ruta_caso'], [], false) }}" class="inline-flex min-h-11 items-center gap-2 rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4 hover:text-tinta-950">
                            {{ __('ui_common.ver_caso_completo') }}<span class="sr-only"> {{ __('ui_common.project_name', ['name' => $proyecto['nombre']]) }}</span>
                            @include('portafolio.parciales.indicador-enlace')
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
