# Portfolio profesional — Nicolás Martín Santa Ana

Portfolio web personal orientado a búsquedas laborales como **Full Stack PHP/Laravel Developer**. Presenta perfil profesional, áreas de valor, stack técnico, experiencia, casos de proyectos, CV y canales de contacto en una única página responsive.

## Objetivo profesional

Comunicar un perfil Full Stack con foco en Laravel, JavaScript, MySQL, APIs REST y sistemas web en producción. El contenido prioriza experiencia aplicada, mantenimiento evolutivo, soporte productivo y comprensión funcional por sobre una lista aislada de tecnologías.

## Stack del proyecto

- PHP 8.3 o superior.
- Laravel 13 (versión instalada al crear este README: 13.19.0).
- Blade.
- Tailwind CSS 4.
- JavaScript nativo.
- Vite 8.

La primera versión no utiliza autenticación, panel administrativo, base de datos ni formularios persistentes.

## Arquitectura

El contenido editable se encuentra centralizado en [`config/portafolio.php`](config/portafolio.php). La ruta principal carga esa configuración y renderiza una vista Blade compuesta por parciales para cada sección.

```text
config/portafolio.php
routes/web.php
resources/views/layouts/portafolio.blade.php
resources/views/portafolio/index.blade.php
resources/views/portafolio/secciones/*.blade.php
resources/css/app.css
resources/js/app.js
```

## Requisitos

- PHP `^8.3` con las extensiones requeridas por Laravel.
- Composer 2.
- Node.js y npm compatibles con Vite 8.

No es necesario crear una base de datos ni ejecutar migraciones.

## Instalación local

1. Clonar el repositorio e ingresar al directorio:

   ```bash
   git clone https://github.com/nmsantaana1994/portfolio-nicolas-santa-ana.git
   cd portfolio-nicolas-santa-ana
   ```

2. Instalar las dependencias PHP:

   ```bash
   composer install
   ```

3. Crear el archivo de entorno y generar la clave de la aplicación.

   En Linux o macOS:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   En PowerShell:

   ```powershell
   Copy-Item .env.example .env
   php artisan key:generate
   ```

4. Instalar y compilar los assets:

   ```bash
   npm install
   npm run build
   ```

## Ejecución en desarrollo

Usar dos terminales:

```bash
php artisan serve
```

```bash
npm run dev
```

La aplicación estará disponible por defecto en `http://127.0.0.1:8000`.

## Comandos útiles

```bash
# Ejecutar pruebas
php artisan test

# Aplicar formato al código PHP
vendor/bin/pint

# Levantar Vite con recarga automática
npm run dev

# Generar assets optimizados
npm run build

# Limpiar cachés de Laravel
php artisan optimize:clear
```

## Currículum en PDF

El CV no se incluye como archivo de ejemplo. Para habilitar su descarga, agregar el PDF real en:

```text
public/cv/Nicolas_Santa_Ana_CV_FullStack_Laravel.pdf
```

Mientras no exista, la interfaz muestra un estado informativo y no genera enlaces rotos.

## Variables de entorno

La configuración propuesta no depende de una base de datos:

```env
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

En producción también deben definirse correctamente `APP_KEY`, `APP_ENV`, `APP_DEBUG` y `APP_URL`.

## Deploy en Railway

El proyecto está preparado para un despliegue sencillo sin servicios de base de datos.

Configuración sugerida:

- Build command:

  ```bash
  composer install --no-dev --optimize-autoloader && npm ci && npm run build
  ```

- Start command:

  ```bash
  php artisan serve --host=0.0.0.0 --port=$PORT
  ```

- Variables mínimas:

  ```env
  APP_ENV=production
  APP_DEBUG=false
  APP_URL=https://tu-dominio.up.railway.app
  APP_KEY=base64:clave-generada
  SESSION_DRIVER=file
  CACHE_STORE=file
  QUEUE_CONNECTION=sync
  LOG_CHANNEL=stderr
  ```

La clave puede generarse localmente con `php artisan key:generate --show` y cargarse como variable privada en Railway. Luego del despliegue, actualizar `APP_URL` con el dominio definitivo para que los metadatos canónicos y Open Graph usen la URL pública correcta.
