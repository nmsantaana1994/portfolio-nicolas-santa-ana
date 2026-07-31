# Roadmap — Portfolio V2.1

## Objetivo

V2.1 incorpora Foco Finanzas como proyecto insignia a partir de evidencia técnica y visual verificable, sin alterar la arquitectura liviana del portfolio ni publicar información de la beta privada.

## Fuente de verdad

El contenido proviene del handoff y del cierre técnico de Foco Finanzas, fechados el 31 de julio de 2026. La integración conserva sus límites editoriales:

- repositorio privado;
- beta privada activa en staging;
- producción pública no operativa;
- capturas generadas únicamente con datos sintéticos;
- ownership respaldado a nivel de aplicación, sin afirmar RLS o separación física;
- restore validado sólo de forma local, efímera y sintética con PostgreSQL 18;
- cifras tratadas como una fotografía fechada, no como garantías permanentes.

## Slices

| Slice | Objetivo | Estado |
| --- | --- | --- |
| 1 | Integrar Foco como caso insignia con evidencia visual light/dark | Completado e integrado |
| 2 | Validar CI, desplegar y revisar la integración pública | Completado |

## Principios

- Centralizar el contenido editable en `config/portafolio.php`.
- Separar el proyecto propio de los casos derivados de experiencia laboral.
- Conservar los 12 assets aprobados sin recomprimir ni editar.
- Cargar imágenes de forma diferida y declarar dimensiones.
- Mantener la alternancia de tema limitada a las capturas.
- No enlazar el repositorio privado ni inventar una demo pública de Foco.
- Cerrar cada slice con tests, Pint, build y documentación.

## Definición de terminado

V2.1 quedará cerrada cuando:

1. Los 12 assets estén presentes y cubiertos por tests.
2. La página presente problema, solución, responsabilidades, stack, decisiones y límites reales.
3. Las seis escenas puedan revisarse en claro y oscuro.
4. La navegación y el selector de capturas sean accesibles.
5. Tests, Pint, build y `git diff --check` aprueben.
6. GitHub Actions quede verde.
7. Railway despliegue el cambio y se complete un smoke test responsive.

## Cierre

V2.1 fue integrada mediante los PR `#1` y `#2`, validada por GitHub Actions y desplegada correctamente en Railway el 31 de julio de 2026. El detalle se encuentra en las [notas del release V2.1.0](release-v2.1.0.md).

El próximo paso es integrar el commit documental y publicar el tag `v2.1.0`.
