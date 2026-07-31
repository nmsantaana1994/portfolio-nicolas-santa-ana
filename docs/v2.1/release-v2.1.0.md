# Portfolio V2.1.0

## Estado

Integrado, validado y desplegado. Tag pendiente de publicación.

## Resumen

V2.1 incorpora Foco Finanzas como proyecto insignia del portfolio. El caso presenta un producto propio mediante contexto, decisiones técnicas, responsabilidades individuales, evidencia automatizada y seis escenas sintéticas en temas claro y oscuro.

La entrega mantiene la arquitectura deliberadamente simple del portfolio: Laravel 13, Blade, Tailwind CSS 4, JavaScript nativo y Vite, sin base de datos, autenticación ni dependencias adicionales.

## Cambios principales

### Proyecto insignia

- Caso diferenciado de los cuatro proyectos derivados de experiencia laboral.
- Problema, solución, estado, responsabilidades y stack verificable.
- Decisiones sobre dinero, tarjetas, ownership y evidencia sintética.
- Límites explícitos de beta privada, repositorio privado y producción no operativa.

### Evidencia visual

- Seis escenas aprobadas: Dashboard, Plan, Inversiones, Movimientos, Tarjeta/ciclos y Asistente.
- Doce PNG: una variante clara y otra oscura por escena.
- Tema oscuro como presentación inicial y variante clara bajo demanda.
- Dimensiones declaradas, carga diferida y textos alternativos.
- Escenas complementarias dentro de un `details` accesible.

### Evidencia técnica

- 604 tests y 4403 aserciones en la fotografía local de Foco del 31/07/2026.
- Tres jobs de CI en el proyecto fuente: SQLite, PostgreSQL 18 y Browser.
- 12 capturas verificadas con datos sintéticos.
- 48 tablas comparadas en un dump/restore local, efímero y sintético con PostgreSQL 18.

Estas cifras describen el proyecto Foco en una fecha concreta; no son métricas del portfolio ni garantías permanentes.

### Responsive y navegación

- Enlace directo a Foco en navegación desktop y móvil.
- Breakpoint del menú ajustado a 1024 px para conservar espacio con el nuevo enlace.
- Revisión local en 1440 × 900, 768 × 900 y 390 × 844 sin overflow horizontal ni errores de consola.

## Trazabilidad

| Entrega | Referencia |
| --- | --- |
| Implementación principal | `f094d00` |
| PR principal | `#1` |
| Merge principal | `5bc2e75` |
| Preferencia de tema oscuro | `65fb27a` |
| PR de ajuste | `#2` |
| Merge final | `8a72c7b` |
| Deploy Railway | Aprobado manualmente el 31/07/2026 |

GitHub Actions quedó verde en ambas integraciones. Los IDs de runs no se documentan porque no fueron proporcionados.

## Verificación local del slice funcional

- `composer validate --no-check-publish --strict`: aprobado.
- `php artisan test`: 9 tests y 112 aserciones.
- `php vendor/bin/pint --test`: aprobado.
- `npm run build`: aprobado con Vite 8.1.4.
- Revisión Chromium desktop, tablet y mobile: aprobada.
- Hashes de los 12 assets: idénticos a la evidencia aprobada de Foco.

El aviso opcional del plugin de fuentes sobre `fontaine` continúa siendo informativo y no justifica una dependencia adicional.

## Límites

V2.1 no incorpora:

- base de datos o autenticación en el portfolio;
- una demo pública de Foco;
- acceso al repositorio privado;
- datos, URLs o usuarios de la beta;
- analítica, métricas operativas o monitoreo;
- un sistema de tema global para el portfolio;
- claims de RLS, zero-knowledge, alta disponibilidad o producción pública de Foco.

## Publicación

Después de integrar el commit documental y observar GitHub Actions:

```bash
git tag -a v2.1.0 -m "Portfolio V2.1.0"
git push origin v2.1.0
```
