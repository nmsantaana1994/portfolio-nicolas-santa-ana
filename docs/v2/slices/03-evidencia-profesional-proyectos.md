# Slice 3 — Evidencia profesional en proyectos

## Estado

Completado.

## Objetivo

Reforzar los proyectos como evidencia profesional mediante contexto y resultados cualitativos, sin publicar información sensible ni inventar métricas.

## Alcance

- Retirar el challenge técnico Laravel / API REST.
- Mantener cuatro casos vinculados a experiencia real.
- Identificar el contexto de cada proyecto: producción o freelance.
- Incorporar un resultado cualitativo derivado del problema y la solución ya documentados.
- Mantener responsabilidades y stack técnico.
- No incorporar repositorios o demos sin enlaces públicos verificados.

## Proyectos incluidos

1. Sistema de gestión para comedores corporativos.
2. Terminales offline con sincronización.
3. PWA para operación de depósito.
4. Plataforma web para droguería.

## Criterio de contenido

Los resultados describen capacidades obtenidas por la solución, sin afirmar porcentajes, ahorros, volúmenes o métricas que no estén documentadas.

## Archivos involucrados

```text
config/portafolio.php
resources/views/portafolio/secciones/proyectos.blade.php
tests/Feature/PortafolioTest.php
docs/flujo-de-trabajo.md
docs/v2/roadmap.md
docs/v2/slices/03-evidencia-profesional-proyectos.md
```

## Validaciones ejecutadas

| Validación | Resultado |
| --- | --- |
| Proyectos configurados y renderizados | 4 |
| Challenge técnico | Ausente |
| Contexto y resultado | Presentes en los cuatro proyectos |
| `php artisan test` | 8 tests y 52 aserciones correctas |
| `php vendor/bin/pint --test` | Correcto |
| `npm run build` | Correcto con Vite 8.1.4 |

El aviso opcional de `fontaine` continúa sin afectar el build ni justificar una dependencia adicional.

## Resultado

La sección presenta cuatro casos de experiencia real con una lectura más completa de problema, solución, resultado, responsabilidades y stack. No se publicaron métricas, repositorios ni demos no verificadas.

## Próxima tarea

Ejecutar el Slice 4: auditoría de accesibilidad, navegación por teclado, responsive y rendimiento.

## Commit sugerido

```bash
git commit -m "feat(projects): reforzar evidencia de proyectos productivos"
```
