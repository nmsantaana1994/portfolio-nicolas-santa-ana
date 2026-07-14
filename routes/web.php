<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $portafolio = config('portafolio');

    return view('portafolio.index', [
        'portafolio' => $portafolio,
        'cvDisponible' => is_file(public_path($portafolio['cv']['archivo'])),
    ]);
})->name('inicio');
