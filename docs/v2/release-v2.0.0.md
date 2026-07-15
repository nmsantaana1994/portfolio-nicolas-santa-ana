# Portfolio V2.0.0

## Estado

Preparado para publicación.

## Resumen

V2 consolida el portfolio como una presentación profesional, compartible y verificable para oportunidades Full Stack PHP/Laravel. Mantiene una arquitectura deliberadamente simple: Laravel 13, Blade, Tailwind CSS 4 y Vite, sin base de datos ni funcionalidades privadas.

Deploy: [portfolio-nicolas-santa-ana-production.up.railway.app](https://portfolio-nicolas-santa-ana-production.up.railway.app)

## Cambios principales

### Calidad automática

- Workflow de GitHub Actions en cada push y pull request a `main`.
- Validación de Composer, build de Vite, tests y formato con Pint.
- Corrección del orden del pipeline para compilar el manifest de Vite antes de renderizar las vistas en PHPUnit.

### Identidad y metadatos

- Favicon basado en las iniciales personales.
- Imagen Open Graph de 1200 × 630 px.
- Open Graph y Twitter Card completos.
- Metadatos de imagen social cubiertos por tests.

### Evidencia profesional

- Cuatro casos técnicos basados en experiencia real.
- Contexto, problema, solución, resultado cualitativo, responsabilidades y stack.
- Retiro del challenge técnico para priorizar experiencia productiva.
- Sin métricas inventadas, información sensible ni enlaces no verificables.

### Accesibilidad y rendimiento

- Contraste de textos secundarios corregido.
- Nombre accesible del enlace de inicio alineado con su contenido visible.
- Peso 700 real de Instrument Sans incorporado al build.
- Lighthouse mobile y desktop con 100 en Performance, Accessibility, Best Practices y SEO en la verificación de cierre del Slice 4.

### Documentación

- Historial de V1.0 y V1.1.
- Roadmap y registro independiente de los cinco slices de V2.
- Flujo de trabajo Git y convención de commits.
- README alineado con el deploy actual en Railway.

## Verificación de cierre

- `composer validate --no-check-publish --strict`: correcto.
- `php artisan test`: 7 tests y 52 assertions correctas.
- `php vendor/bin/pint --test`: correcto.
- `npm run build`: correcto con Vite 8.1.4.
- GitHub Actions: operativo en `main`.

## Alcance técnico

V2 no incorpora:

- Base de datos.
- Login o registro.
- Panel administrativo.
- Formularios persistentes.
- Blog.
- React, Inertia o Livewire.
- Paquetes Composer o npm adicionales para el producto.
- Rediseño general.

## Revisión de mejoras diferidas

### Candidatas para V2.1

1. **Screenshots de proyectos.** Solo se incorporarán si son reales, visualmente consistentes y pueden anonimizarse por completo. Deben ocultar nombres, marcas, usuarios, correos, identificadores, importes y datos operativos; además necesitarán formato WebP o AVIF, dimensiones consistentes y texto alternativo.
2. **Fotografía profesional.** Puede reemplazar o complementar el concepto de iniciales cuando exista una imagen sobria, reciente y de buena calidad. Se recomienda luz natural frontal, fondo neutro, encuadre desde el pecho, vestimenta lisa y expresión natural; conviene conservar espacio alrededor para recortes horizontal y cuadrado.
3. **Dominio propio.** Evaluar un dominio personal corto y actualizar `APP_URL`, `ASSET_URL`, canonical, Open Graph y Railway en una misma entrega.

### Puede quedar para una versión futura

- Páginas de detalle para proyectos cuando exista evidencia pública suficiente.
- Analítica liviana y respetuosa de la privacidad si aparece una necesidad concreta de medición.
- Limpieza adicional del scaffolding no utilizado de Laravel, sin impacto funcional urgente.

No se recomienda agregar blog, autenticación, base de datos o administración de contenido mientras el portfolio siga siendo una página personal de actualización poco frecuente.

## Publicación

Después de que el commit de cierre pase GitHub Actions:

```bash
git tag -a v2.0.0 -m "Portfolio V2.0.0"
git push origin v2.0.0
```

El contenido de este documento puede reutilizarse como descripción del GitHub Release asociado al tag.
