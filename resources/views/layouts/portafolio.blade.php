@php
    $seo = array_replace($portafolio['seo'], $seo ?? []);
    $urlPortfolio = rtrim(config('app.url'), '/');
    $urlCanonica = $seo['canonical'] ?? $urlPortfolio;
    $imagenSocial = asset($seo['imagen']);
    $pathEs = \App\Support\PortfolioLocale::route(\App\Support\PortfolioLocale::page(), [], false, 'es');
    $urlEs = $urlPortfolio.($pathEs === '/' ? '' : $pathEs);
    $englishPartial = app()->getLocale() === 'en' && ! \App\Support\PortfolioLocale::EN_COMPLETE;
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $seo['titulo'] }}</title>
        <meta name="description" content="{{ $seo['descripcion'] }}">
        <meta name="author" content="{{ $portafolio['persona']['nombre'] }}">
        <meta name="robots" content="{{ $englishPartial ? 'noindex, follow' : 'index, follow' }}">
        <link rel="canonical" href="{{ $urlCanonica }}">
        {{-- EN remains partial: do not advertise it as an indexed translation until 9D.2B. --}}
        <link rel="alternate" hreflang="es" href="{{ $urlEs }}">
        <link rel="alternate" hreflang="x-default" href="{{ $urlEs }}">
        @if (\App\Support\PortfolioLocale::EN_COMPLETE)
            <link rel="alternate" hreflang="en" href="{{ $urlPortfolio.\App\Support\PortfolioLocale::route(\App\Support\PortfolioLocale::page(), [], false, 'en') }}">
        @endif
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

        <meta property="og:title" content="{{ $seo['titulo'] }}">
        <meta property="og:description" content="{{ $seo['descripcion'] }}">
        <meta property="og:type" content="{{ $seo['tipo'] }}">
        <meta property="og:url" content="{{ $urlCanonica }}">
        <meta property="og:locale" content="{{ $seo['locale'] }}">
        <meta property="og:site_name" content="Portfolio de {{ $portafolio['persona']['nombre'] }}">
        <meta property="og:image" content="{{ $imagenSocial }}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="{{ $seo['imagen_ancho'] }}">
        <meta property="og:image:height" content="{{ $seo['imagen_alto'] }}">
        <meta property="og:image:alt" content="{{ $seo['imagen_alt'] }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo['titulo'] }}">
        <meta name="twitter:description" content="{{ $seo['descripcion'] }}">
        <meta name="twitter:image" content="{{ $imagenSocial }}">
        <meta name="twitter:image:alt" content="{{ $seo['imagen_alt'] }}">

        <meta name="color-scheme" content="light dark">
        <meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)">
        <meta name="theme-color" content="#0b1220" media="(prefers-color-scheme: dark)">
        @include('portafolio.parciales.tema')

        <script type="application/ld+json">
            {!! json_encode([
                '@'.'context' => 'https://schema.org',
                '@type' => 'Person',
                'name' => $portafolio['persona']['nombre'],
                'jobTitle' => $portafolio['persona']['titulo'],
                'url' => $urlPortfolio,
                'email' => 'mailto:'.$portafolio['contacto']['email'],
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Buenos Aires',
                    'addressCountry' => 'AR',
                ],
                'sameAs' => [$portafolio['contacto']['linkedin'], $portafolio['contacto']['github']],
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <a href="#contenido" class="sr-only z-50 rounded-md bg-white px-4 py-3 font-semibold text-tinta-950 shadow-lg focus:not-sr-only focus:fixed focus:left-4 focus:top-4">
            Ir al contenido
        </a>

        @yield('contenido')
    </body>
</html>
