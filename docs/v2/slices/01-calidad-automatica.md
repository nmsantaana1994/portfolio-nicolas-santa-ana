# Slice 1 — Calidad automática

## Estado

Completado.

## Objetivo

Validar automáticamente la calidad del portfolio en cada push y en cada pull request dirigido a `main`.

## Alcance

El workflow debe comprobar:

- Validez de `composer.json` y `composer.lock`.
- Instalación reproducible de dependencias PHP y frontend.
- Suite de tests de Laravel.
- Formato PHP mediante Pint.
- Build de producción mediante Vite.

## Decisiones

- Runner: `ubuntu-latest`.
- PHP: 8.4.
- Node.js: 22.
- Composer: versión 2.
- Sin cobertura de código, porque no aporta valor suficiente para el tamaño actual.
- Sin servicios de base de datos.
- Sin secretos de GitHub Actions.
- Permisos del workflow limitados a lectura del repositorio.
- Ejecuciones anteriores de la misma referencia se cancelan para evitar trabajo duplicado.

## Acciones utilizadas

- `actions/checkout@v7`.
- `actions/setup-node@v7`.
- `shivammathur/setup-php@v2`.

Las versiones se verificaron contra sus publicaciones oficiales antes de crear el workflow.

## Archivos involucrados

```text
.github/workflows/quality.yml
README.md
composer.lock
docs/README.md
docs/v2/roadmap.md
docs/v2/slices/01-calidad-automatica.md
```

`composer.lock` se sincronizó porque su hash no reflejaba el requisito actual de PHP `^8.4`. No se actualizaron versiones ni se instalaron paquetes nuevos.

## Validaciones ejecutadas

| Validación | Resultado |
| --- | --- |
| `composer validate --no-check-publish --strict` | Correcto |
| `php artisan test` | 6 tests y 27 aserciones correctas |
| `php vendor/bin/pint --test` | Correcto |
| `npm run build` | Correcto con Vite 8.1.4 |

El build conserva un aviso informativo sobre `fontaine`, una optimización opcional de fuentes que no afecta el resultado ni justifica agregar una dependencia.

## Resultado

El repositorio cuenta con una verificación automática y reproducible para cambios enviados a GitHub. El workflow no requiere base de datos, servicios externos ni secretos.

## Corrección posterior

La primera ejecución en un checkout limpio detectó que los tests de la home necesitan el manifest generado por Vite para renderizar `@vite`. Localmente el problema quedaba oculto porque `public/build` ya existía y no está versionado.

Se reordenó el workflow para ejecutar `npm run build` después de `npm ci` y antes de `php artisan test`. De esta forma los tests conservan la integración real con Vite y el pipeline funciona igual que una instalación limpia, sin versionar assets ni desactivar Vite durante las pruebas.

Commit sugerido para la corrección:

```bash
git commit -m "fix(ci): compilar assets antes de ejecutar tests"
```

## Próxima tarea

Definir y preparar el Slice 2: favicon, imagen Open Graph y metadatos sociales asociados.

## Commit sugerido

```bash
git commit -m "ci(quality): automatizar tests y build del portfolio"
```
