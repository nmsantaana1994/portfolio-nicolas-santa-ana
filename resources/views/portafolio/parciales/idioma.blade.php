<details class="selector-tema" data-language-selector>
    <summary aria-label="{{ __('common.language') }}: {{ strtoupper(app()->getLocale()) }}" title="{{ __('common.language') }}">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9"/><ellipse cx="12" cy="12" rx="4" ry="9"/><path d="M3 12h18"/></svg>
        <span class="text-[10px] font-bold leading-none">{{ strtoupper(app()->getLocale()) }}</span>
    </summary>
    <nav class="opciones-tema" aria-label="{{ __('common.language') }}">
        @foreach (['es' => 'Español', 'en' => 'English'] as $idioma => $nombre)
            <a class="opcion-tema rounded-lg" href="{{ \App\Support\PortfolioLocale::route(\App\Support\PortfolioLocale::page(), [], false, $idioma) }}" hreflang="{{ $idioma }}" lang="{{ $idioma }}" data-language="{{ $idioma }}" @if (app()->getLocale() === $idioma) aria-current="true" @endif>
                <span class="text-xs font-bold">{{ strtoupper($idioma) }}</span><span>{{ $nombre }}</span>
                @if (app()->getLocale() === $idioma)<span aria-hidden="true">@include('portafolio.parciales.icono-apariencia', ['tipo' => 'check'])</span>@endif
            </a>
        @endforeach
    </nav>
</details>
