<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Middleware\SetPortfolioLocale;
use App\Support\PortfolioLocale;
use Illuminate\Support\Facades\Route;

foreach (['es' => '', 'en' => 'en'] as $locale => $prefix) {
    Route::prefix($prefix)->name($locale === 'en' ? 'en.' : '')->middleware(SetPortfolioLocale::class)->group(function () {
        foreach (PortfolioLocale::PAGES as $name => [$path]) {
            Route::get($path, PortfolioController::class)->name($name);
        }
    });
}
