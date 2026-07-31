# Slice 1 — Foco Finanzas como proyecto insignia

## Estado

Completado localmente. Pendiente de CI, integración y validación del deploy.

## Objetivo

Convertir el cierre técnico de Foco Finanzas en un caso público profesional, visual y verificable dentro del portfolio personal.

## Alcance

- Incorporar una sección diferenciada para el proyecto propio.
- Presentar contexto, problema, solución, responsabilidades y stack.
- Publicar decisiones técnicas y métricas respaldadas.
- Incorporar las seis escenas aprobadas en variantes clara y oscura.
- Permitir alternar el tema de las capturas con controles accesibles.
- Mantener los cuatro proyectos laborales existentes sin modificaciones conceptuales.
- Documentar procedencia, fecha y límites de las afirmaciones.

## Decisiones

### Caso separado

Foco no se agregó como una quinta tarjeta genérica. Cuenta con evidencia de arquitectura, seguridad, calidad, operación y producto suficiente para justificar una jerarquía propia, sin desplazar los casos laborales.

### Assets originales

Se copiaron los 12 PNG aprobados por el proceso de evidencia de Foco. No fueron recomprimidos, retocados ni regenerados. Las imágenes se publican desde:

```text
public/images/projects/foco/{light,dark}/
```

### Tema local de la galería

El portfolio general conserva su identidad clara. Las capturas comienzan en modo oscuro por decisión visual y el selector “Claro/Oscuro” permite cambiar únicamente la evidencia de Foco, actualizando `aria-pressed`; no introduce un sistema de tema global ni una dependencia adicional.

### Carga y accesibilidad

- Las imágenes declaran ancho y alto.
- Se usa `loading="lazy"` y `decoding="async"`.
- Las variantes claras cargan bajo demanda al seleccionar el tema.
- Cada variante activa conserva el texto alternativo descriptivo.
- Las escenas complementarias viven en un elemento `details` navegable por teclado.
- Sin JavaScript, la variante oscura permanece visible y el contenido principal continúa accesible.

## Evidencia publicada

- 604 tests automatizados en la línea base local del 31/07/2026.
- Tres jobs de CI: SQLite, PostgreSQL 18 y Browser.
- Doce capturas verificadas: seis escenas en claro y oscuro.
- 48 tablas comparadas durante un dump/restore local, efímero y sintético con PostgreSQL 18.

Las cifras son fotografías fechadas. No se afirma producción pública, repositorio abierto, restore de Railway, RLS, zero-knowledge, uptime, adopción ni garantías absolutas de seguridad.

## Archivos involucrados

```text
config/portafolio.php
public/images/projects/foco/
resources/js/app.js
resources/views/portafolio/index.blade.php
resources/views/portafolio/secciones/proyecto-insignia.blade.php
tests/Feature/PortafolioTest.php
README.md
docs/README.md
docs/v2.1/roadmap.md
docs/v2.1/slices/01-foco-proyecto-insignia.md
```

## Validaciones locales

| Validación | Resultado |
| --- | --- |
| Assets de Foco | 12 PNG presentes |
| `php artisan test` | 9 tests y 112 aserciones aprobados |
| `php vendor/bin/pint --test` | Aprobado |
| `npm run build` | Aprobado con Vite 8.1.4 |
| `git diff --check` | Aprobado |
| Revisión Browser 1440 × 900 | HTTP 200, selector operativo, sin overflow ni errores |
| Revisión Browser 768 × 900 | HTTP 200, menú móvil, sin overflow ni errores |
| Revisión Browser 390 × 844 | HTTP 200, selector operativo, sin overflow ni errores |

El build conserva el aviso informativo del plugin de fuentes sobre `fontaine`; no afecta la compilación ni justifica una dependencia adicional.

La revisión Browser local utilizó Chromium y comprobó el heading del caso, el cambio de capturas, `aria-pressed`, errores de página/consola y ancho del documento. Los scripts y screenshots diagnósticos se eliminaron después de la inspección; no forman parte del producto.

## Validación pendiente

- GitHub Actions.
- Deploy y smoke test en Railway.

## Commit sugerido

```bash
git commit -m "feat(projects): integrar Foco como proyecto insignia"
```

## Próximo paso

Publicar la rama y cerrar el Slice 2 con CI y deploy aprobados.
