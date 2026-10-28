<?php

namespace App\Support;

use Illuminate\Support\Arr;

class PortfolioContent
{
    public const GROUPS = [
        'profile' => ['persona', 'hero', 'navegacion', 'sobre_mi', 'focos', 'experiencias', 'proyectos'],
        'services' => ['servicios'],
        'foco' => ['proyecto_insignia'],
        'commercial' => ['caso_empresarial'],
        'terminals' => ['caso_terminales'],
        'menus' => ['caso_sgm_healthy'],
        'operations' => ['caso_plataformas_operativas'],
    ];

    /** Spanish editorial source only; structural data never enters the catalogues. */
    public static function source(string $group): array
    {
        $source = [];
        foreach (Arr::dot(Arr::only(config('portafolio'), self::GROUPS[$group])) as $path => $value) {
            $field = last(explode('.', $path));
            if (! is_string($value) || in_array($field, ['id', 'icono', 'archivo', 'nombre_descarga', 'ruta', 'ruta_caso', 'ancla', 'revision', 'valor', 'grupo', 'formato', 'empresa', 'nombre', 'imagen', 'imagen_alt', 'tipo', 'locale'], true)) {
                // 'tipo' is editorial in project cases, but structural in SEO.
                if ($field !== 'tipo' || str_contains($path, '.seo.')) {
                    continue;
                }
            }
            if (! is_string($value) || str_contains($path, '.stack.') || str_contains($path, '.evidencia.') || str_ends_with($path, '.colaboracion')) {
                continue;
            }
            $source[$path] = $value;
        }

        return $source;
    }

    public static function localized(): array
    {
        $content = config('portafolio');
        foreach (self::GROUPS as $group => $keys) {
            foreach (self::source($group) as $path => $spanish) {
                Arr::set($content, $path, __($group.'.'.$path));
            }
        }

        return $content;
    }

    public static function label(string $value): string
    {
        $key = array_search($value, trans('labels', [], 'es'), true);

        return $key === false ? $value : __('labels.'.$key);
    }
}
