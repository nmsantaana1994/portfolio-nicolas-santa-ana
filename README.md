# Portfolio profesional — Nicolás Martín Santa Ana

[![Calidad](https://github.com/nmsantaana1994/portfolio-nicolas-santa-ana/actions/workflows/quality.yml/badge.svg)](https://github.com/nmsantaana1994/portfolio-nicolas-santa-ana/actions/workflows/quality.yml)

Portfolio web personal de Nicolás Martín Santa Ana, orientado a oportunidades como **Full Stack PHP/Laravel Developer**. Presenta perfil profesional, foco de valor, stack técnico, experiencia, casos de proyectos, CV descargable y canales de contacto en una única página responsive.

Sitio publicado: [portfolio-nicolas-santa-ana-production.up.railway.app](https://portfolio-nicolas-santa-ana-production.up.railway.app)

Versión actual: **V2.0.0**. El alcance y las decisiones del cierre están documentados en las [notas del release](docs/v2/release-v2.0.0.md).

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

- PHP 8.4 o superior, con las extensiones requeridas por Laravel.
- Composer 2.
- Node.js y npm compatibles con Vite.
- Git.

No es necesario crear una base de datos ni ejecutar migraciones.

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
   npm install
   ```

## Ejecución local

Levantar Laravel en una terminal:

```bash
php artisan serve --port=8001
```

Levantar Vite en otra terminal:

```bash
npm run dev
```

El portfolio estará disponible en `http://127.0.0.1:8001`.

## Comandos útiles

```bash
# Instalar dependencias PHP
composer install

# Instalar dependencias frontend
npm install

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
    Hero, sobre mí, foco, stack, experiencia, proyectos, CV y contacto.

resources/css/app.css
    Tailwind CSS 4, tema visual y estilos globales mínimos.

resources/js/app.js
    Comportamiento accesible del menú móvil.

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

El proceso de despliegue debe instalar las dependencias PHP, instalar las dependencias frontend y compilar los assets de Vite:

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
```

Como comando de inicio puede utilizarse:

```bash
php artisan serve --host=0.0.0.0 --port=$PORT
```

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

Después de modificar variables de entorno en Railway, se debe realizar un nuevo deploy para reconstruir los assets y aplicar la configuración actualizada.

## Alcance actual

El portfolio está diseñado como una página pública y liviana. No incluye:

- Base de datos.
- Login o registro.
- Panel administrativo.
- Formularios persistentes.
- React, Inertia o Livewire.
- Servicios backend adicionales.
