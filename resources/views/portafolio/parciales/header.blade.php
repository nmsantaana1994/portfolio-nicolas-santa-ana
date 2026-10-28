@php($prefijoInicio = \App\Support\PortfolioLocale::page() === 'inicio' ? '' : \App\Support\PortfolioLocale::route('inicio', [], false))
    <header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/95 backdrop-blur">
        <nav class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-5 py-4 sm:px-8 lg:px-10" aria-label="Navegación principal">
            <a href="{{ $prefijoInicio }}#inicio" class="text-sm font-bold tracking-tight text-tinta-950 sm:text-base" aria-label="Nicolás Santa Ana — volver al inicio">
                Nicolás Santa Ana
            </a>

            <div class="hidden items-center gap-1 lg:flex xl:gap-5">
                @foreach ($portafolio['navegacion'] as $item)
                    <a href="{{ isset($item['ruta']) ? \App\Support\PortfolioLocale::route($item['ruta'], [], false) : $prefijoInicio.'#'.$item['ancla'] }}" @if (isset($item['ruta']) && \App\Support\PortfolioLocale::page() === $item['ruta']) aria-current="page" @endif class="inline-flex min-h-11 items-center rounded-md px-2 text-sm font-medium text-tinta-600 transition-colors hover:bg-acento-50 hover:text-acento-700 aria-[current=page]:bg-acento-50 aria-[current=page]:text-acento-700 motion-reduce:transition-none">
                        {{ $item['etiqueta'] }}
                    </a>
                @endforeach
            </div>

            <div class="flex shrink-0 items-center gap-2">
                @if (\App\Support\PortfolioLocale::showSelector())
                    @include('portafolio.parciales.idioma')
                @endif
                <details class="selector-tema" data-apariencia>
                    <summary aria-label="Apariencia del portfolio: Sistema" title="Apariencia del portfolio" data-apariencia-boton>
                        @foreach (['system', 'light', 'dark'] as $tipo)
                            <span data-icono-tema="{{ $tipo }}" @class(['hidden' => $tipo !== 'system'])>@include('portafolio.parciales.icono-apariencia', ['tipo' => $tipo])</span>
                        @endforeach
                    </summary>
                    <fieldset class="opciones-tema">
                        <legend class="sr-only">Apariencia del portfolio</legend>
                        @foreach (['system' => 'Sistema', 'light' => 'Claro', 'dark' => 'Oscuro'] as $valor => $etiqueta)
                            <label class="opcion-tema">
                                <input type="radio" name="portfolio-theme" value="{{ $valor }}" class="sr-only" data-selector-tema @checked($valor === 'system') disabled>
                                @include('portafolio.parciales.icono-apariencia', ['tipo' => $valor])
                                <span class="text-sm font-medium">{{ $etiqueta }}</span>
                                <span class="marca-tema">@include('portafolio.parciales.icono-apariencia', ['tipo' => 'check'])</span>
                            </label>
                        @endforeach
                    </fieldset>
                </details>
                <button type="button" class="inline-flex size-11 items-center justify-center rounded-lg border border-slate-300 text-tinta-700 transition-colors hover:border-acento-700 hover:bg-acento-50 motion-reduce:transition-none lg:hidden" aria-expanded="false" aria-controls="menu-movil" aria-label="Abrir navegación" data-menu-boton>
                    <svg aria-hidden="true" class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" />
                    </svg>
                </button>
            </div>
        </nav>

        <div id="menu-movil" class="hidden border-t border-slate-200 bg-white px-5 py-4 lg:hidden" data-menu-movil>
            <div class="mx-auto flex max-w-7xl flex-col gap-1">
                @foreach ($portafolio['navegacion'] as $item)
                    <a href="{{ isset($item['ruta']) ? \App\Support\PortfolioLocale::route($item['ruta'], [], false) : $prefijoInicio.'#'.$item['ancla'] }}" @if (isset($item['ruta']) && \App\Support\PortfolioLocale::page() === $item['ruta']) aria-current="page" @endif class="rounded-lg px-3 py-3 text-sm font-medium text-tinta-700 hover:bg-acento-50 hover:text-acento-700 aria-[current=page]:bg-acento-50 aria-[current=page]:text-acento-700">
                        {{ $item['etiqueta'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>
    @if (app()->getLocale() === 'en' && ! \App\Support\PortfolioLocale::EN_COMPLETE)
        <p class="border-b border-slate-200 bg-acento-50 px-5 py-3 text-center text-sm text-tinta-700" role="note">{{ __('common.partial') }}</p>
    @endif
