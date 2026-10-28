<?php

namespace App\Http\Controllers;

use App\Support\PortfolioLocale;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function __invoke(): View
    {
        $page = PortfolioLocale::page();
        [, $view, $key] = PortfolioLocale::PAGES[$page];
        $portafolio = config('portafolio');
        $portafolio['navegacion'][0]['etiqueta'] = __('navigation.projects');
        $portafolio['navegacion'][2]['etiqueta'] = __('navigation.services');
        $seo = $key ? ($portafolio[$key]['seo'] ?? []) : [
            'titulo' => __('seo.home_title'),
            'descripcion' => __('seo.home_description'),
        ];
        if ($page === 'proyectos.foco-finanzas') {
            $seo = [
                'titulo' => 'Foco Finanzas — Caso de estudio | Nicolás Santa Ana',
                'descripcion' => 'Caso de estudio de Foco Finanzas: producto propio en beta privada, planificación financiera, PWA, IA controlada, pruebas y evolución técnica documentada hasta octubre de 2026.',
            ];
        }
        $seo['canonical'] = rtrim(config('app.url'), '/').PortfolioLocale::route($page, [], false);
        if ($page === 'inicio' && app()->getLocale() === 'es') {
            $seo['canonical'] = rtrim(config('app.url'), '/');
        }
        $seo['locale'] = app()->getLocale() === 'en' ? 'en_US' : 'es_AR';

        return view($view, [
            'portafolio' => $portafolio,
            'seo' => $seo,
            'cvDisponible' => is_file(public_path($portafolio['cv']['archivo'])),
        ]);
    }
}
