# Documentación del portfolio

Este directorio registra la evolución técnica y funcional del portfolio. Su objetivo es conservar el contexto de las decisiones, el alcance de cada versión y el estado real del trabajo sin sobrecargar el README principal.

## Estructura

```text
docs/
├── README.md
└── v2/
    ├── roadmap.md
    └── slices/
        └── 01-calidad-automatica.md
```

## Documentos activos

| Documento | Propósito |
| --- | --- |
| [Roadmap V2](v2/roadmap.md) | Alcance, fases, decisiones y estado general de V2. |
| [Slice 1 — Calidad automática](v2/slices/01-calidad-automatica.md) | Implementación del workflow de GitHub Actions. |

## Criterio de actualización

Cada slice debe documentar:

- Objetivo y alcance.
- Archivos involucrados.
- Decisiones tomadas.
- Validaciones ejecutadas.
- Estado final.
- Próxima tarea.
- Commit sugerido.

La documentación se actualiza dentro del mismo commit del slice al que pertenece.
