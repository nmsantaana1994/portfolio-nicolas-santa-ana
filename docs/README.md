# Documentación del portfolio

Este directorio registra la evolución técnica y funcional del portfolio. Su objetivo es conservar el contexto de las decisiones, el alcance de cada versión y el estado real del trabajo sin sobrecargar el README principal.

## Estructura

```text
docs/
├── README.md
├── flujo-de-trabajo.md
├── v1/
│   ├── README.md
│   ├── v1.0.md
│   └── v1.1.md
└── v2/
    ├── roadmap.md
    └── slices/
        └── 01-calidad-automatica.md
```

## Documentos activos

| Documento | Propósito |
| --- | --- |
| [Historial V1](v1/README.md) | Alcance y cierre de V1.0 y V1.1. |
| [Roadmap V2](v2/roadmap.md) | Alcance, fases, decisiones y estado general de V2. |
| [Slice 1 — Calidad automática](v2/slices/01-calidad-automatica.md) | Implementación del workflow de GitHub Actions. |
| [Slice 2 — Identidad visual](v2/slices/02-identidad-visual-open-graph.md) | Favicon, imagen Open Graph y metadatos sociales. |
| [Flujo de trabajo Git](flujo-de-trabajo.md) | Estrategia de ramas y convención de commits. |

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
