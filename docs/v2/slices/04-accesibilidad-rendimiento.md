# Slice 4 — Accesibilidad y rendimiento

## Estado

Completado.

## Objetivo

Medir el deploy en mobile y desktop y corregir únicamente problemas verificables de accesibilidad o rendimiento, sin introducir cambios cosméticos.

## Herramientas

- Lighthouse 13.4.0 ejecutado de forma temporal, sin agregarlo como dependencia.
- Revisión de contraste según WCAG.
- Revisión manual de semántica, foco, teclado y responsive.
- Tests, Pint y build del proyecto.

## Línea base de producción

| Métrica | Mobile | Desktop |
| --- | ---: | ---: |
| Performance | 100 | 100 |
| Accessibility | 96 | 95 |
| Best Practices | 100 | 100 |
| SEO | 100 | 100 |
| FCP | 1.1 s | 0.3 s |
| LCP | 1.2 s | 0.4 s |
| CLS | 0 | 0 |
| TBT | 0 ms | 0 ms |

## Hallazgos

### Contraste de etiquetas

`#98a2b3` sobre blanco alcanzaba `2.57:1` en textos de 12 px. Lighthouse exige al menos `4.5:1` para ese tamaño.

Se reemplaza por `#667085`, con una relación calculada de `4.97:1` sobre blanco, conservando la jerarquía visual secundaria.

### Nombre accesible del enlace de inicio

El enlace mostraba “Nicolás Santa Ana” pero su nombre accesible era únicamente “Volver al inicio”. Se ajusta la etiqueta para incluir el contenido visible y su propósito.

### Peso tipográfico

Las vistas utilizan `font-bold` (`700`), pero Vite solo cargaba Instrument Sans 400, 500 y 600. Se incorpora el peso 700 para evitar negritas sintetizadas por el navegador.

## Aspectos validados sin cambios

- Enlace para saltar al contenido.
- Foco global visible.
- Menú móvil con `aria-expanded`, etiqueta dinámica y cierre mediante `Escape`.
- Devolución del foco al botón al cerrar con teclado.
- Contenido oculto fuera del árbol accesible mediante `display: none`.
- Movimiento reducido aplicado al scroll suave.
- Jerarquía de encabezados y HTML semántico.
- JavaScript mínimo y no bloqueante.
- Imagen Open Graph fuera del contenido visual principal.

## Resultado posterior

| Métrica | Mobile | Desktop |
| --- | ---: | ---: |
| Performance | 100 | 100 |
| Accessibility | 100 | 100 |
| Best Practices | 100 | 100 |
| SEO | 100 | 100 |
| FCP | 1.3 s | 0.3 s |
| LCP | 1.4 s | 0.3 s |
| CLS | 0 | 0 |
| TBT | 0 ms | 0 ms |

La medición local mobile se repitió porque una primera ejecución aislada registró un bloqueo que no aparecía en producción ni desktop. La repetición estable obtuvo TBT de 0 ms y puntuación 100. La captura final de Lighthouse, con emulación real de 412 × 823 px, confirmó el comportamiento responsive del hero, la navegación y sus acciones principales.

## Archivos involucrados

- `resources/css/app.css`: contraste del color secundario.
- `vite.config.js`: carga del peso tipográfico 700.
- `resources/views/portafolio/index.blade.php`: nombre accesible del enlace de inicio.
- `tests/Feature/PortafolioTest.php`: cobertura de la etiqueta accesible.
- `docs/`: registro y avance del roadmap.

## Validaciones ejecutadas

| Validación | Resultado |
| --- | --- |
| `php artisan test` | 8 tests, 53 assertions, correcto |
| `php vendor/bin/pint --test` | Correcto |
| `npm run build` | Correcto |
| Lighthouse mobile | 100 / 100 / 100 / 100 |
| Lighthouse desktop | 100 / 100 / 100 / 100 |
| Revisión responsive | Correcta en emulación mobile y desktop |

Lighthouse 13.4.0 se ejecutó mediante `npx` solo para la auditoría. No se agregó ninguna dependencia al proyecto.

## Próxima tarea

Ejecutar el Slice 5: revisar las áreas de mejora restantes —incluida la conveniencia de incorporar capturas anonimizadas— y cerrar la documentación y el release de V2.

## Commit sugerido

```bash
git commit -m "fix(a11y): corregir contraste y nombres accesibles"
```
