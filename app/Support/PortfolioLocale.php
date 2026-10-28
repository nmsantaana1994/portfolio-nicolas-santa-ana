<?php

namespace App\Support;

class PortfolioLocale
{
    // Enable only after the editorial/SEO review of all English pages in 9D.2B.
    public const EN_COMPLETE = false;

    public static function showSelector(): bool
    {
        return self::EN_COMPLETE || in_array(config('app.env'), ['local', 'testing'], true);
    }

    public const PAGES = [
        'inicio' => ['/', 'portafolio.index', null],
        'servicios' => ['/servicios', 'servicios', 'servicios'],
        'proyectos.foco-finanzas' => ['/proyectos/foco-finanzas', 'proyectos.foco-finanzas', 'proyecto_insignia'],
        'proyectos.soluciones-comerciales' => ['/proyectos/soluciones-comerciales', 'proyectos.soluciones-comerciales', 'caso_empresarial'],
        'proyectos.terminales' => ['/proyectos/terminales', 'proyectos.terminales', 'caso_terminales'],
        'proyectos.sgm-healthy' => ['/proyectos/sgm-healthy', 'proyectos.sgm-healthy', 'caso_sgm_healthy'],
        'proyectos.plataformas-operativas' => ['/proyectos/plataformas-operativas', 'proyectos.plataformas-operativas', 'caso_plataformas_operativas'],
    ];

    public static function page(): string
    {
        return preg_replace('/^en\./', '', request()->route()->getName());
    }

    public static function route(string $name, array $parameters = [], bool $absolute = true, ?string $locale = null): string
    {
        $locale ??= app()->getLocale();

        return route(($locale === 'en' ? 'en.' : '').$name, $parameters, $absolute);
    }
}
