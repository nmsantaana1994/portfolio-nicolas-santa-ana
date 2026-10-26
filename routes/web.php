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

Route::get('/servicios', function () {
    $portafolio = config('portafolio');

    return view('servicios', [
        'portafolio' => $portafolio,
        'seo' => array_merge($portafolio['servicios']['seo'], [
            'canonical' => rtrim(config('app.url'), '/').'/servicios',
        ]),
        'cvDisponible' => is_file(public_path($portafolio['cv']['archivo'])),
    ]);
})->name('servicios');

Route::get('/proyectos/soluciones-comerciales', function () {
    $portafolio = config('portafolio');

    return view('proyectos.soluciones-comerciales', [
        'portafolio' => $portafolio,
        'seo' => array_merge($portafolio['caso_empresarial']['seo'], [
            'canonical' => rtrim(config('app.url'), '/').'/proyectos/soluciones-comerciales',
        ]),
        'cvDisponible' => is_file(public_path($portafolio['cv']['archivo'])),
    ]);
})->name('proyectos.soluciones-comerciales');

Route::get('/proyectos/terminales', function () {
    $portafolio = config('portafolio');

    return view('proyectos.terminales', [
        'portafolio' => $portafolio,
        'seo' => array_merge($portafolio['caso_terminales']['seo'], [
            'canonical' => rtrim(config('app.url'), '/').'/proyectos/terminales',
        ]),
        'cvDisponible' => is_file(public_path($portafolio['cv']['archivo'])),
    ]);
})->name('proyectos.terminales');
