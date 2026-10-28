<?php

namespace App\Http\Middleware;

use App\Support\PortfolioLocale;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetPortfolioLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale($request->routeIs('en.*') ? 'en' : 'es');

        $response = $next($request);
        $response->headers->set('Content-Language', app()->getLocale());
        if (app()->getLocale() === 'en' && ! PortfolioLocale::EN_COMPLETE) {
            $response->headers->set('X-Robots-Tag', 'noindex, follow');
        }

        return $response;
    }
}
