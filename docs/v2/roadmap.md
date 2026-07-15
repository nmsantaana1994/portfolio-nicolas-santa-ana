# Roadmap — Portfolio V2

## Objetivo

La V2 busca aumentar la credibilidad profesional, la calidad del repositorio y la capacidad de compartir el portfolio sin convertirlo en una aplicación compleja.

## Principios

- Implementar cambios pequeños, verificables y desplegables.
- Mantener Laravel, Blade y Tailwind CSS como base.
- Centralizar el contenido editable.
- No inventar resultados, métricas o evidencia profesional.
- No exponer información sensible de clientes o empresas.
- No agregar dependencias sin una justificación técnica fuerte.
- Cerrar cada slice con tests, build, documentación y un commit independiente.

## Fuera de alcance

- Login o registro.
- Base de datos.
- Panel administrativo.
- Blog.
- Formularios persistentes.
- React, Inertia o Livewire.
- Rediseño completo.

## Estado de los slices

| Slice | Objetivo | Estado |
| --- | --- | --- |
| 1 | Calidad automática con GitHub Actions | Completado |
| 2 | Identidad visual y Open Graph | Completado |
| 3 | Evidencia profesional en proyectos | Completado |
| 4 | Accesibilidad y rendimiento | Completado |
| 5 | Documentación y release V2 | Pendiente |

## Definición de terminado

Un slice se considera terminado cuando:

1. Cumple su objetivo sin cambios ajenos al alcance.
2. No incorpora secretos ni artefactos generados.
3. Pasa las validaciones correspondientes:

   ```bash
   php artisan test
   php vendor/bin/pint --test
   npm run build
   git diff --check
   ```

4. Actualiza su documento dentro de `docs/v2/slices/`.
5. Deja indicado el siguiente paso y el commit sugerido.

## Convención de commits

Se utiliza Conventional Commits con mensajes breves en español:

```text
<tipo>(<alcance>): <descripción>
```

Ejemplos:

```bash
git commit -m "ci(quality): automatizar tests y build del portfolio"
git commit -m "feat(seo): agregar identidad visual y vista previa social"
git commit -m "feat(projects): incorporar resultados y enlaces verificables"
git commit -m "fix(a11y): corregir hallazgos de accesibilidad y navegación"
git commit -m "docs(release): documentar cambios de la versión 2.0.0"
```

## Próxima tarea

Ejecutar el Slice 5: revisar pendientes de mejora y preparar la documentación y el release de V2.
