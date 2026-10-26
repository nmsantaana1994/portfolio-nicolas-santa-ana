@echo off
setlocal

for %%I in ("%~dp0..") do set "PROJECT_ROOT=%%~fI"

if not defined LARAGON_ROOT (
    for %%I in ("%PROJECT_ROOT%\..\..") do set "LARAGON_ROOT=%%~fI"
)

set "LARAGON_INI=%LARAGON_ROOT%\usr\laragon.ini"

if not exist "%LARAGON_INI%" (
    echo [ERROR] No se encontro Laragon en "%LARAGON_ROOT%".
    echo Define LARAGON_ROOT para esta sesion y vuelve a intentarlo.
    exit /b 1
)

set "PHP_VERSION="
for /f "usebackq tokens=1,* delims==" %%A in (`findstr /B /C:"Version=php-" "%LARAGON_INI%"`) do set "PHP_VERSION=%%B"

if not defined PHP_VERSION (
    echo [ERROR] No se pudo determinar el PHP seleccionado en Laragon.
    exit /b 1
)

set "PHP_DIR=%LARAGON_ROOT%\bin\php\%PHP_VERSION%"

if not exist "%PHP_DIR%\php.exe" (
    echo [ERROR] No existe "%PHP_DIR%\php.exe".
    exit /b 1
)

set "PATH=%PHP_DIR%;%PATH%"

php -r "exit(PHP_VERSION_ID >= 80401 && PHP_VERSION_ID < 80500 ? 0 : 1);"
if errorlevel 1 (
    echo [ERROR] El proyecto requiere PHP 8.4.1 o superior dentro de la rama 8.4.
    php -v
    exit /b 1
)

where composer >nul 2>&1
if errorlevel 1 (
    echo [ERROR] Composer no esta disponible en PATH.
    exit /b 1
)

where node >nul 2>&1
if errorlevel 1 (
    echo [ERROR] Node.js no esta disponible en PATH.
    exit /b 1
)

where npm.cmd >nul 2>&1
if errorlevel 1 (
    echo [ERROR] npm.cmd no esta disponible en PATH.
    exit /b 1
)

echo PHP seleccionado: %PHP_VERSION%
php -r "echo 'PHP '.PHP_VERSION.PHP_EOL;"
call composer --version
node --version
call npm.cmd --version

if exist "%PROJECT_ROOT%\vendor\autoload.php" (
    pushd "%PROJECT_ROOT%"
    php artisan --version
    php vendor/bin/phpunit --version
    popd
) else (
    echo Dependencias PHP pendientes: ejecuta composer install.
)

if /I "%~1"=="--check" exit /b 0

if not "%~1"=="" (
    echo [ERROR] Argumento no reconocido: %~1
    echo Uso: scripts\dev-shell.cmd [--check]
    exit /b 1
)

echo.
echo Abriendo PowerShell con el entorno local del proyecto.
echo Usa npm.cmd en lugar de npm para respetar la Execution Policy.
pushd "%PROJECT_ROOT%"
powershell.exe -NoLogo -NoExit
popd
