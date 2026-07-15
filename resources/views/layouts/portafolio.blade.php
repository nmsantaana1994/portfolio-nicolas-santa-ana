@php
    $urlCanonica = rtrim(config('app.url'), '/');
    $imagenSocial = asset($portafolio['seo']['imagen']);
@endphp

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $portafolio['seo']['titulo'] }}</title>
        <meta name="description" content="{{ $portafolio['seo']['descripcion'] }}">
        <meta name="author" content="{{ $portafolio['persona']['nombre'] }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ $urlCanonica }}">
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

        <meta property="og:title" content="{{ $portafolio['seo']['titulo'] }}">
        <meta property="og:description" content="{{ $portafolio['seo']['descripcion'] }}">
        <meta property="og:type" content="{{ $portafolio['seo']['tipo'] }}">
        <meta property="og:url" content="{{ $urlCanonica }}">
        <meta property="og:locale" content="{{ $portafolio['seo']['locale'] }}">
        <meta property="og:site_name" content="Portfolio de {{ $portafolio['persona']['nombre'] }}">
        <meta property="og:image" content="{{ $imagenSocial }}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="{{ $portafolio['seo']['imagen_ancho'] }}">
        <meta property="og:image:height" content="{{ $portafolio['seo']['imagen_alto'] }}">
        <meta property="og:image:alt" content="{{ $portafolio['seo']['imagen_alt'] }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $portafolio['seo']['titulo'] }}">
        <meta name="twitter:description" content="{{ $portafolio['seo']['descripcion'] }}">
        <meta name="twitter:image" content="{{ $imagenSocial }}">
        <meta name="twitter:image:alt" content="{{ $portafolio['seo']['imagen_alt'] }}">

        <meta name="theme-color" content="#101828">

        <script type="application/ld+json">
            {!! json_encode([
                '@'.'context' => 'https://schema.org',
                '@type' => 'Person',
                'name' => $portafolio['persona']['nombre'],
                'jobTitle' => $portafolio['persona']['titulo'],
                'url' => $urlCanonica,
                'email' => 'mailto:'.$portafolio['contacto']['email'],
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Buenos Aires',
                    'addressCountry' => 'AR',
                ],
                'sameAs' => [$portafolio['contacto']['linkedin'], $portafolio['contacto']['github']],
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <a href="#contenido" class="sr-only z-50 rounded-md bg-white px-4 py-3 font-semibold text-tinta-950 shadow-lg focus:not-sr-only focus:fixed focus:left-4 focus:top-4">
            Ir al contenido
        </a>

        @yield('contenido')
    </body>
</html>
