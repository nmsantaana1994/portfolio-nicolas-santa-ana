# Portfolio profesional — Nicolás Martín Santa Ana

[![Calidad](https://github.com/nmsantaana1994/portfolio-nicolas-santa-ana/actions/workflows/quality.yml/badge.svg)](https://github.com/nmsantaana1994/portfolio-nicolas-santa-ana/actions/workflows/quality.yml)

Portfolio web personal de Nicolás Martín Santa Ana, orientado a oportunidades como **Full Stack PHP/Laravel Developer**. Presenta perfil profesional, stack técnico, experiencia, casos de proyectos, el caso insignia Foco Finanzas, CV descargable y canales de contacto en una única página responsive.

Sitio publicado: [portfolio-nicolas-santa-ana-production.up.railway.app](https://portfolio-nicolas-santa-ana-production.up.railway.app)

Versión actual: **V2.1.0**. La integración de Foco Finanzas, sus validaciones y límites están documentados en las [notas del release](docs/v2.1/release-v2.1.0.md).

## Stack del proyecto

- PHP 8.4 o superior.
- Laravel 13.
- Blade.
- Tailwind CSS 4.
- JavaScript nativo.
- Vite.
- Railway.

La versión actual no utiliza base de datos, login, panel administrativo ni formularios persistentes.

La evolución técnica, las decisiones y el estado de cada fase se registran en la [documentación del proyecto](docs/README.md).

## Requisitos locales

- PHP 8.4.1 o superior dentro de la rama 8.4, con las extensiones requeridas por Laravel.
- Composer 2.
- Node.js 22.12 o superior dentro de la rama 22 y npm 10.9.4.
- Git.

No es necesario crear una base de datos ni ejecutar migraciones.

### Windows con Laragon

Desde PowerShell o la terminal integrada de VS Code, ejecutar:

```powershell
.\scripts\dev-shell.cmd
```

El launcher detecta la instalación de Laragon a partir de la ubicación del repositorio, lee la versión PHP seleccionada en `usr/laragon.ini` y abre una PowerShell hija con ese PHP agregado únicamente a su `PATH`. No modifica Laragon, Windows ni la política de ejecución.

Si Laragon no contiene el repositorio bajo su carpeta `www`, se puede indicar su raíz sólo para la sesión actual:

```powershell
$env:LARAGON_ROOT = 'C:\ruta\a\laragon'
.\scripts\dev-shell.cmd
```

Para comprobar el entorno sin abrir una terminal interactiva:

```powershell
.\scripts\dev-shell.cmd --check
```

En PowerShell se debe utilizar `npm.cmd` en lugar de `npm`, porque el launcher de npm en formato `.ps1` puede estar bloqueado por la Execution Policy.

## Instalación local

1. Clonar el repositorio e ingresar en el proyecto:

   ```bash
   git clone https://github.com/nmsantaana1994/portfolio-nicolas-santa-ana.git
   cd portfolio-nicolas-santa-ana
   ```

2. Instalar las dependencias PHP:

   ```bash
   composer install
   ```

3. Crear el archivo de entorno.

   En Linux o macOS:

   ```bash
   cp .env.example .env
   ```

   En PowerShell:

   ```powershell
   Copy-Item .env.example .env
   ```

4. Generar la clave de la aplicación:

   ```bash
   php artisan key:generate
   ```

5. Instalar las dependencias frontend:

   ```bash
   npm ci
   ```

## Ejecución local

Levantar Laravel en una terminal:

```bash
php artisan serve --port=8001
```

Levantar Vite en otra terminal. En PowerShell:

```powershell
npm.cmd run dev
```

El portfolio estará disponible en `http://127.0.0.1:8001`.

## Comandos útiles

```bash
# Instalar dependencias PHP
composer install

# Instalar dependencias frontend desde el lock
npm ci

# Ejecutar Vite en desarrollo
npm run dev

# Compilar assets para producción
npm run build

# Levantar el servidor local en el puerto configurado
php artisan serve --port=8001

# Ejecutar la suite de pruebas
php artisan test

# Verificar el formato PHP
php vendor/bin/pint --test
```

## Estructura principal

```text
config/portafolio.php
    Contenido profesional, contacto, proyectos y metadatos editables.

routes/web.php
    Ruta de la página principal y detección del CV.

resources/views/layouts/portafolio.blade.php
    Layout general, SEO, Open Graph, JSON-LD y carga de Vite.

resources/views/portafolio/index.blade.php
    Navegación, composición de secciones y footer.

resources/views/portafolio/secciones/
    Hero, sobre mí, foco, stack, experiencia, proyecto insignia, proyectos, CV y contacto.

public/images/projects/foco/
    Seis escenas sintéticas de Foco Finanzas en variantes clara y oscura.

resources/css/app.css
    Tailwind CSS 4, tema visual y estilos globales mínimos.

resources/js/app.js
    Comportamiento accesible del menú móvil y selector de tema de la evidencia visual.

tests/Feature/PortafolioTest.php
    Pruebas de contenido, SEO, enlaces y disponibilidad del CV.
```

## Currículum descargable

El CV utilizado por el portfolio se encuentra en:

```text
public/cv/Nicolas_Santa_Ana_CV_FullStack_Laravel.pdf
```

La aplicación comprueba su existencia antes de generar el enlace. Si el archivo falta, muestra un estado informativo y evita una navegación rota.

## Deploy en Railway

El deploy actual se encuentra en:

```text
https://portfolio-nicolas-santa-ana-production.up.railway.app
```

El servicio usa **Railpack con FrankenPHP**, con inicio automático del proveedor Laravel y sin un start command personalizado. La auditoría del deployment de `25c79fc` confirmó Railpack 0.43.0, PHP 8.4.27, Node 22.23.3 y npm 10.9.9. Las versiones son una fotografía de ese deployment; Railpack puede resolver nuevos parches compatibles en builds posteriores.

Los siguientes comandos son una referencia manual de instalación y compilación:

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
```

No representan literalmente el plan automático de Railway: el deployment auditado ejecutó `composer install --optimize-autoloader --no-scripts --no-interaction`, `npm install`, `npm run build` y `npm prune --omit=dev --ignore-scripts`. El build command configurado es `npm run build`.

FrankenPHP sirve la aplicación mediante la configuración generada por Railpack. `php artisan serve` se utiliza en desarrollo local; no es el servidor productivo efectivo. El servicio tiene una réplica en US East y no tiene volúmenes persistentes; los archivos del contenedor son efímeros.

### Variables de Railway

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://portfolio-nicolas-santa-ana-production.up.railway.app
ASSET_URL=https://portfolio-nicolas-santa-ana-production.up.railway.app
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
LOG_CHANNEL=stderr
```

También debe configurarse una `APP_KEY` válida como variable privada. Puede generarse localmente con:

```bash
php artisan key:generate --show
```

`ASSET_URL` es necesaria en este deploy de Railway para que Laravel genere correctamente las URLs públicas de los assets compilados por Vite. Sin esa variable, el CSS de Tailwind y el JavaScript pueden apuntar a una URL incorrecta y no cargar en producción.

### Cierre operativo pendiente de aplicación

La auditoría confirmó migraciones automáticas al arrancar y ningún healthcheck configurado en Railway. Los siguientes ajustes están preparados documentalmente y requieren autorización antes de aplicarse:

- Variable del servicio `RAILPACK_SKIP_MIGRATIONS=true`: evita las migraciones automáticas del arranque Laravel de Railpack. El portfolio no necesita base de datos funcionalmente.
- Healthcheck del servicio: `/up`, que ya responde HTTP 200. Railway comprobará esta ruta antes de activar el nuevo deployment; no es monitoreo continuo después del despliegue.

Procedimiento desde el dashboard de Railway:

1. Seleccionar el proyecto `amiable-freedom` (`09529c5a-5454-40ec-806b-822d6ef1d360`), entorno `production` (`f5db1fe9-7795-45d9-897d-40aaddc26e40`) y servicio `portfolio-nicolas-santa-ana` (`ba85960f-9589-4a07-bf38-9c8c33c449d4`). Confirmar el repositorio GitHub y un deployment activo en estado `SUCCESS`.
2. Comprobar si la clave `RAILPACK_SKIP_MIGRATIONS` ya existe. Registrar únicamente su estado previo para una eventual reversión, sin exportar otras variables.
3. En Variables, agregar o ajustar únicamente esa clave a `true`. En Settings > Deploy, establecer Healthcheck Path en `/up`. Mantener el builder y el start command automático.
4. Revisar los cambios pendientes antes de desplegar: sólo deben aparecer la variable indicada y el healthcheck. Si Railway ofrece aplicar/desplegar los cambios, hacerlo una sola vez después de preparar ambos. Si la interfaz aplica un ajuste inmediatamente, asumir que puede generar un deployment y verificar su estado antes de continuar.
5. Esperar el deployment exitoso y comprobar su commit. Revisar los logs de arranque: no deben aparecer ejecuciones de `artisan migrate`, migraciones ni seeding. Si aparecen, detener el cierre y diagnosticar el comportamiento del script de Railpack.
6. Confirmar el healthcheck `/up` en la configuración efectiva y la activación del nuevo deployment. Comprobar HTTP 200 en `/` y `/up` y realizar una revisión visual breve del portfolio.

Las modificaciones de variables o configuración pueden iniciar un nuevo deployment. `railway variable set` ofrece `--skip-deploys`, y `railway environment edit` ofrece `--stage`; aun así, no se deben ejecutar durante una auditoría. La CLI 4.58.0 tiene un reporte de no aplicación de ciertos campos `deploy.*` mediante dot-path, por lo que este procedimiento usa el dashboard y exige verificar el resultado efectivo.

Reversión: restaurar el estado previo de la única variable modificada (eliminarla si antes no existía) y borrar `/up` del healthcheck para recuperar su estado anterior vacío. Revisar y aplicar únicamente esas diferencias. La reversión de configuración también puede generar un deployment; volver a un deployment previo por sí solo no garantiza restaurar las variables y settings actuales. No eliminar bases ni archivos para revertir estos ajustes.

Referencias: [inicio Laravel y variable de migraciones de Railpack](https://railpack.com/languages/php/), [healthchecks de Railway](https://docs.railway.com/deployments/healthchecks) y [configuración por CLI](https://docs.railway.com/cli/environment).

## Alcance actual

El portfolio está diseñado como una página pública y liviana. No incluye:

- Base de datos.
- Login o registro.
- Panel administrativo.
- Formularios persistentes.
- React, Inertia o Livewire.
- Servicios backend adicionales.
