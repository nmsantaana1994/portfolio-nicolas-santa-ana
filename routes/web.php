<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $portafolio = config('portafolio');

    return view('portafolio.index', [
        'portafolio' => $portafolio,
        'cvDisponible' => is_file(public_path($portafolio['cv']['archivo'])),
    ]);
})->name('inicio');

Route::get('/proyectos/foco-finanzas', function () {
    $portafolio = config('portafolio');

    return view('proyectos.foco-finanzas', [
        'portafolio' => $portafolio,
        'seo' => [
            'titulo' => 'Foco Finanzas — Caso de estudio | Nicolás Santa Ana',
            'descripcion' => 'Caso de estudio de Foco Finanzas: producto propio en beta privada, planificación financiera, PWA, IA controlada, pruebas y evolución técnica documentada hasta octubre de 2026.',
            'canonical' => rtrim(config('app.url'), '/').'/proyectos/foco-finanzas',
        ],
        'cvDisponible' => is_file(public_path($portafolio['cv']['archivo'])),
    ]);
})->name('proyectos.foco-finanzas');
