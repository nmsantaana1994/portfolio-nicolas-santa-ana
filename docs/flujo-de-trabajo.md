# Flujo de trabajo Git

## Estrategia

El portfolio utiliza un flujo basado en `main` y ramas cortas:

- `main`: versión estable y desplegable en Railway.
- `feat/<nombre>`: funcionalidades o slices nuevos.
- `fix/<nombre>`: correcciones puntuales.
- `docs/<nombre>`: documentación sin cambios funcionales.

No se mantiene una rama `develop` permanente. Para un proyecto individual con un único entorno de producción agregaría coordinación y divergencia sin aportar una validación adicional. Puede incorporarse más adelante si se crea un entorno de staging independiente.

## Flujo recomendado

```bash
git switch main
git pull --ff-only
git switch -c feat/identidad-visual
```

Después de validar el slice:

```bash
git add <archivos-del-slice>
git commit -m "feat(seo): agregar identidad visual y vista previa social"
git push -u origin feat/identidad-visual
```

La rama se integra a `main` mediante pull request. Railway continúa desplegando únicamente desde `main`.

El workflow de calidad se ejecuta automáticamente tanto en push como en pull request. Actualmente GitHub no obliga a crear un PR: el push directo a `main` sigue permitido. Si más adelante se configura una ruleset de protección para `main`, los PR pueden convertirse en un requisito sin cambiar el workflow.

## Convención

Los commits siguen Conventional Commits y cada uno debe representar un cambio completo, validado y documentado.
