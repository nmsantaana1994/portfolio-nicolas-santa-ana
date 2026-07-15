# Slice 2 — Identidad visual y Open Graph

## Estado

Completado.

## Objetivo

Crear una identidad visual mínima y consistente para reconocer el portfolio en el navegador y al compartirlo en redes o mensajería.

## Concepto visual

- Monograma: `NS`.
- Base: azul tinta `#101828`.
- Acento: azul `#1570ef` y celeste `#53b1fd`.
- Estética: técnica, sobria y sin referencias visuales a una empresa específica.
- Tipografía: sans serif de alta legibilidad.

## Texto de la tarjeta social

```text
Nicolás Martín Santa Ana
Full Stack PHP/Laravel Developer
Laravel · JavaScript · MySQL · APIs REST
```

La línea secundaria refuerza sistemas web de gestión, integraciones y soporte evolutivo.

## Recursos

```text
public/favicon.svg
public/images/og-portfolio.png
resources/images/og-portfolio.svg
```

El SVG dentro de `resources/images` es la fuente editable. El PNG público se exporta a `1200 × 630`, formato ampliamente compatible con Open Graph.

## Metadatos

- `og:image`, tipo, dimensiones y texto alternativo.
- `twitter:card=summary_large_image`.
- Imagen y texto alternativo para Twitter Card.
- Favicon SVG explícito.
- Configuración editable centralizada en `config/portafolio.php`.

## Recomendaciones para una foto futura

- Retrato horizontal o de medio cuerpo.
- Fondo neutro y sin elementos de marcas o clientes.
- Luz natural suave y lateral.
- Cámara a la altura de los ojos.
- Ropa lisa, sin logos ni estampados dominantes.
- Expresión natural y profesional.
- Espacio negativo hacia uno de los lados para permitir composiciones.
- Archivo original de al menos 2000 px en su lado mayor.

La foto solo debería incorporarse si aporta cercanía y credibilidad sin romper la identidad sobria del portfolio.

## Validaciones ejecutadas

| Validación | Resultado |
| --- | --- |
| Dimensiones del PNG | `1200 × 630` |
| Existencia de favicon e imagen pública | Correcto |
| Metadatos Open Graph y Twitter Card | Cubiertos por tests |
| `php artisan test` | 7 tests y 36 aserciones correctas |
| `php vendor/bin/pint --test` | Correcto |
| `npm run build` | Correcto con Vite 8.1.4 |

El aviso opcional de `fontaine` continúa sin afectar la compilación y no justifica agregar una dependencia.

## Resultado

El portfolio cuenta con una identidad reconocible mediante el monograma `NS`, favicon propio y una vista previa social compatible con Open Graph y Twitter Card. Los textos, rutas y dimensiones permanecen centralizados o documentados.

## Próxima tarea

Relevar repositorios, demos y resultados que puedan mostrarse públicamente para el Slice 3: evidencia profesional en proyectos.

## Commit sugerido

```bash
git commit -m "feat(seo): agregar identidad visual y vista previa social"
```
