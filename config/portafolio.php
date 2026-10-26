<?php

return [
    'seo' => [
        'titulo' => 'Nicolás Martín Santa Ana | Full Stack PHP/Laravel Developer',
        'descripcion' => 'Portfolio de Nicolás Martín Santa Ana, Full Stack PHP/Laravel Developer especializado en APIs REST y sistemas web en producción.',
        'tipo' => 'website',
        'locale' => 'es_AR',
        'imagen' => 'images/og-portfolio.png',
        'imagen_alt' => 'Nicolás Martín Santa Ana — Full Stack PHP/Laravel Developer',
        'imagen_ancho' => 1200,
        'imagen_alto' => 630,
    ],

    'persona' => [
        'nombre' => 'Nicolás Martín Santa Ana',
        'titulo' => 'Full Stack PHP/Laravel Developer',
        'presentacion' => 'Construyo y evoluciono sistemas de gestión, aplicaciones web e integraciones para empresas. Combino backend PHP/Laravel con interfaces claras para quienes usan el software todos los días.',
        'ubicacion' => 'CABA, Buenos Aires, Argentina',
    ],

    'hero' => [
        'titulo' => 'Desarrollo software para',
        'enfasis' => 'resolver problemas reales.',
        'disponibilidad' => 'Oportunidades laborales y proyectos freelance',
    ],

    'navegacion' => [
        ['etiqueta' => 'Proyectos', 'ancla' => 'foco-finanzas'],
        ['etiqueta' => 'Experiencia', 'ancla' => 'experiencia'],
        ['etiqueta' => 'Servicios', 'ruta' => 'servicios'],
        ['etiqueta' => 'Cómo trabajo', 'ancla' => 'competencias'],
        ['etiqueta' => 'Sobre mí', 'ancla' => 'sobre-mi'],
        ['etiqueta' => 'Contacto', 'ancla' => 'contacto'],
    ],

    'sobre_mi' => 'Me interesa entender cómo trabaja una organización antes de diseñar una solución. Mi experiencia combina desarrollo full stack, análisis funcional, soporte e implementación: traduzco necesidades operativas en funcionalidades claras y acompaño su evolución en producción.',

    'servicios' => [
        'seo' => [
            'titulo' => 'Desarrollo web y servicios de software | Nicolás Santa Ana',
            'descripcion' => 'Desarrollo de aplicaciones web, integración de sistemas y evolución de software con PHP y Laravel. Conocé mi experiencia y conversemos sobre tu proyecto.',
        ],
        'titulo' => 'Desarrollo y evolución de software para tu negocio.',
        'presentacion' => 'Te ayudo a transformar procesos en aplicaciones web, conectar sistemas y mejorar el software que ya usás. Trabajo como desarrollador Full Stack, con foco en PHP y Laravel.',
        'capacidades' => [
            [
                'titulo' => 'Aplicaciones y sistemas web',
                'problema' => 'Un proceso necesita una herramienta propia, con reglas y recorridos que las soluciones genéricas no contemplan.',
                'solucion' => 'Puedo desarrollar sistemas de gestión y aplicaciones web a medida, desde el modelo de datos y la lógica de negocio hasta la interfaz de uso.',
                'evidencia' => 'Experiencia publicada en sistemas de gestión operativa y una plataforma web para droguería.',
                'ruta' => 'inicio',
                'ancla' => 'proyectos',
                'enlace' => 'Ver casos profesionales',
            ],
            [
                'titulo' => 'Integración y automatización',
                'problema' => 'Las herramientas no se comunican y parte del trabajo depende de trasladar o revisar información manualmente.',
                'solucion' => 'Puedo conectar aplicaciones mediante APIs y desarrollar intercambios de datos y validaciones para acompañar el circuito real del negocio.',
                'evidencia' => 'Los casos publicados de gestión y droguería incluyen integración de APIs y procesos operativos.',
                'ruta' => 'inicio',
                'ancla' => 'proyectos',
                'enlace' => 'Ver experiencia en integraciones',
            ],
            [
                'titulo' => 'Mantenimiento y evolución',
                'problema' => 'Una aplicación sigue siendo necesaria, pero necesita corregir errores, incorporar funciones o adaptarse a cambios de la operación.',
                'solucion' => 'Puedo analizar el funcionamiento existente, diagnosticar incidencias y desarrollar mejoras acotadas, cuidando las reglas y los flujos que ya se utilizan.',
                'evidencia' => 'La experiencia profesional publicada incluye mantenimiento evolutivo, soporte productivo y documentación de sistemas de gestión.',
                'ruta' => 'inicio',
                'ancla' => 'experiencia',
                'enlace' => 'Ver experiencia profesional',
            ],
            [
                'titulo' => 'Calidad, pruebas y entrega',
                'problema' => 'Cambiar software también exige comprobar que lo nuevo funciona y que los recorridos existentes siguen respondiendo.',
                'solucion' => 'Puedo incorporar pruebas y validaciones al desarrollo, revisar flujos de uso y acompañar entregas controladas con documentación y comprobaciones proporcionales al cambio.',
                'evidencia' => 'Foco Finanzas documenta pruebas automatizadas, integración continua y validación manual como parte de la evolución de un producto propio.',
                'ruta' => 'proyectos.foco-finanzas',
                'ancla' => 'calidad',
                'enlace' => 'Ver evidencia en Foco Finanzas',
            ],
        ],
        'forma_trabajo' => [
            ['titulo' => 'Entender el contexto', 'descripcion' => 'Conversamos sobre el proceso, las personas que lo usan y las herramientas existentes. Primero, entender qué hace falta resolver.'],
            ['titulo' => 'Definir un alcance', 'descripcion' => 'Acordamos prioridades, límites y criterios para revisar el trabajo. Las decisiones técnicas acompañan ese alcance, no lo reemplazan.'],
            ['titulo' => 'Construir y validar', 'descripcion' => 'Avanzamos con cambios revisables, pruebas y documentación. La validación combina el comportamiento del software con el recorrido de quienes lo utilizan.'],
        ],
    ],

    'focos' => [
        ['titulo' => 'Entender la operación', 'descripcion' => 'Relevamiento y análisis funcional para definir el dominio, las reglas de negocio y los recorridos de quienes usan el sistema.'],
        ['titulo' => 'Construir e integrar', 'descripcion' => 'Desarrollo full stack: interfaces operativas, lógica de negocio, APIs REST y datos relacionales con consultas SQL e integridad de datos.'],
        ['titulo' => 'Acompañar la evolución', 'descripcion' => 'Mantenimiento evolutivo, soporte productivo y documentación técnica para sostener el funcionamiento y mejorar el software con el negocio.'],
    ],

    'stack' => [
        'Backend / Laravel' => ['PHP', 'Laravel', 'Blade', 'Eloquent ORM', 'Artisan', 'Composer', 'APIs REST', 'JSON', 'JWT', 'Roles y permisos'],
        'Frontend / UI' => ['JavaScript', 'Vue.js', 'jQuery', 'AJAX', 'HTML5', 'CSS3', 'Bootstrap', 'Tailwind CSS', 'AG Grid', 'Chart.js', 'Vite'],
        'Base de datos' => ['MySQL', 'MariaDB', 'SQLite', 'SQL', 'Diseño relacional', 'Migraciones', 'Seeders', 'Índices', 'Claves foráneas', 'Transacciones'],
        'Cloud / DevOps' => ['Git', 'GitHub', 'GitLab', 'AWS EC2', 'AWS S3', 'Railway', 'Vercel', 'IIS', 'Linux básico por consola'],
        'Prácticas' => ['Código limpio', 'Documentación técnica', 'Análisis funcional', 'Soporte productivo', 'Mejora continua', 'Mantenimiento de sistemas reales'],
    ],

    'experiencias' => [
        [
            'empresa' => 'FoodService',
            'puesto' => 'Full Stack Developer PHP/Laravel',
            'resumen' => 'Desarrollo y mantenimiento evolutivo de sistemas web de gestión para operaciones gastronómicas, integrando backend Laravel, interfaces operativas y soporte a producción.',
        ],
        [
            'empresa' => 'CentralFarm',
            'puesto' => 'Freelance Full Stack Developer',
            'resumen' => 'Implementación de funcionalidades web e integraciones orientadas a procesos de droguería, con foco en trazabilidad, datos consistentes y flujos de trabajo claros.',
        ],
        [
            'empresa' => 'GlobalMed',
            'puesto' => 'Freelance Full Stack Developer',
            'resumen' => 'Desarrollo de soluciones a medida, relevamiento funcional y mejoras sobre módulos de negocio, coordinando necesidades operativas con decisiones técnicas mantenibles.',
        ],
        [
            'empresa' => 'Report System',
            'puesto' => 'Front-End Developer / Soporte de Implementación',
            'resumen' => 'Construcción y ajuste de interfaces, acompañamiento de implementaciones y resolución de incidencias para asegurar una adopción estable del producto.',
        ],
    ],

    'proyecto_insignia' => [
        'nombre' => 'Foco Finanzas',
        'subtitulo' => 'Finanzas personales mobile-first con Laravel',
        'contexto' => 'Proyecto propio · Beta privada',
        'descripcion' => 'Aplicación web instalable para relacionar cuentas, movimientos, tarjetas, cuotas, presupuestos, metas e inversiones manuales, con planificación, avisos e IA asistiva de solo lectura.',
        'resumen_problema' => 'Saldos, cuotas y vencimientos separados dificultan entender el disponible real del mes.',
        'resumen_solucion' => 'Una aplicación que relaciona movimientos, planificación y ahorro sin duplicar impactos financieros.',
        'presentacion_caso' => 'Una aplicación de finanzas personales para entender movimientos, cuotas y ahorro en un mismo lugar.',
        'problema' => 'La información financiera personal suele quedar fragmentada entre saldos, consumos, cuotas, vencimientos, metas e inversiones, dificultando entender el disponible real y los compromisos del mes.',
        'solucion' => 'Foco reúne la actividad y la planificación en una misma aplicación: distingue gastos de transferencias, relaciona tarjetas y cuotas con sus vencimientos, y permite seguir presupuestos y metas. El asistente ayuda a interpretar la información, sin modificar los datos financieros.',
        'responsabilidades' => 'Definición y evolución del producto, modelado financiero, backend Laravel y PostgreSQL, interfaz responsive, integraciones controladas, seguridad y privacidad, pruebas, CI con runner propio, Docker local, entrega a staging, recuperación y documentación técnica.',
        'estado' => 'Beta privada activa en staging, con ampliación controlada en preparación. Repositorio privado; no se presenta como un producto público en producción.',
        // Revisión de código/documentación local del 25/10/2026, Foco c6ac7cb.
        // No acredita el estado remoto del último deployment ni del último run.
        'revision' => '25/10/2026',
        'nota_visual' => 'Galería histórica: escenario sintético del 17/07/2026. Representa los módulos, no la interfaz vigente de octubre; cambiaron textos, jerarquías y recorridos.',
        'stack' => ['PHP 8.4', 'Laravel 13', 'PostgreSQL 18', 'Blade', 'Tailwind CSS', 'JavaScript', 'Playwright', 'Docker', 'GitHub Actions'],
        'funcionalidades' => [
            'movimientos' => [
                'titulo' => 'Cuentas y movimientos',
                'descripcion' => 'Ingresos, gastos, transferencias y comprobantes privados permiten reconstruir la actividad. Los estados pendiente y confirmado se distinguen sin mezclar sus totales; la carga rápida facilita el registro desde distintas pantallas.',
            ],
            'tarjetas' => [
                'titulo' => 'Tarjetas, resúmenes y cuotas',
                'descripcion' => 'Consumos, cierres, vencimientos y cuotas conservan su contexto histórico. Los pagos acumulados se relacionan con la cobertura de las cuotas, sin contar el pago de la tarjeta como un segundo gasto.',
            ],
            'planificacion' => [
                'titulo' => 'Presupuestos, metas y compromisos',
                'descripcion' => 'Presupuestos, metas, compromisos y suscripciones ayudan a leer las obligaciones del mes. La aplicación diferencia dinero operativo, progreso asignado a metas y proyecciones parciales cuando falta información de conversión.',
            ],
            'inversiones' => [
                'titulo' => 'Inversiones manuales y asistente',
                'descripcion' => 'Posiciones y valuaciones manuales permiten analizar la cartera sin prometer cotizaciones en tiempo real. El asistente conserva el período de consulta y utiliza herramientas de solo lectura; la IA externa es opcional, con consentimiento y límites, sin ejecutar operaciones financieras ni brindar asesoramiento.',
            ],
        ],
        'capacidades' => [
            [
                'titulo' => 'PWA y avisos accionables',
                'descripcion' => 'Instalación desde el navegador, bandeja personal con archivo y enlaces al contexto financiero, y Web Push opt-in con mensajes genéricos. La pantalla offline no almacena información financiera para operar sin conexión.',
            ],
            [
                'titulo' => 'Rutinas y lectura contextual',
                'descripcion' => 'Revisiones semanal y mensual reúnen prioridades y accesos al detalle. El asistente puede continuar la lectura del período elegido sin modificar los datos financieros.',
            ],
            [
                'titulo' => 'Privacidad y administración',
                'descripcion' => 'Gestión de sesiones propias, exportación y eliminación de datos, MFA administrativo y reautenticación para operaciones sensibles. La administración incorpora acceso beta y analítica agregada first-party, sin abrir finanzas individuales en esos paneles.',
            ],
        ],
        // docs/40-estado-beta-activa.md, G4-E, base e9832e3: 10/10/2026.
        // Son dos ejecuciones de la misma suite; no sumar como tests únicos.
        'metricas' => [
            ['valor' => '1.299', 'etiqueta' => 'tests aprobados · SQLite', 'detalle' => '10/10/2026 · 11.286 aserciones · 43 omitidos'],
            ['valor' => '1.341', 'etiqueta' => 'tests aprobados · PostgreSQL', 'detalle' => '10/10/2026 · 12.046 aserciones · 1 omitido'],
            ['valor' => '3', 'etiqueta' => 'jobs de Quality', 'detalle' => 'Workflow revisado el 25/10/2026: SQLite, PostgreSQL y Browser'],
            ['valor' => '12', 'etiqueta' => 'capturas sintéticas', 'detalle' => 'Seis escenas en claro y oscuro · referencia 17/07/2026'],
        ],
        // docs/09-roadmap.md, docs/24-direccion-ux-ui-global.md e historial Git.
        // CI: docs/infraestructura/github-actions-self-hosted-runner.md,
        // secciones 19 y 21, 20/10/2026; full y critical son corridas distintas.
        // Recovery: docs/09-roadmap.md y docs/34-operacion-staging-datos-reales.md,
        // FF-BETA3-001, cierre 30/09/2026; no acredita recuperación integral.
        'evolucion' => [
            ['periodo' => 'Agosto 2026', 'titulo' => 'Una experiencia de uso más continua', 'descripcion' => 'Carga rápida global, gestos móviles y una bandeja personal de notificaciones con archivo y navegación al detalle.'],
            ['periodo' => 'Septiembre 2026', 'titulo' => 'Integridad y recuperación', 'descripcion' => 'Cobertura acumulada de pagos de tarjeta, estabilidad histórica de cuotas y liquidaciones coordinadas con atomicidad e idempotencia. Ejercicio de recuperación aislada y MFA administrativo.'],
            ['periodo' => 'Octubre 2026', 'titulo' => 'Claridad, privacidad y calidad de entrega', 'descripcion' => 'Conceptos financieros alineados entre pantallas, gestión de sesiones y reautenticación, límites de IA, retención de datos, analítica interna, revisiones del mes y mejoras de accesibilidad y responsive. CI sobre runner propio y mantenimiento de seguridad del runtime.'],
        ],
        'decisiones' => [
            [
                'titulo' => 'Una cifra necesita contexto',
                'problema' => 'Saldo, resultado mensual y proyección responden preguntas distintas; mezclarlos puede confundir la planificación.',
                'descripcion' => 'Cada lectura conserva su moneda, período y estado. El producto diferencia disponible operativo, deuda, resultado y proyecciones con información incompleta.',
                'consecuencia' => 'Las pantallas y el asistente explican qué representa cada importe, sin sumar monedas distintas ni tratar pendientes como confirmados.',
            ],
            [
                'titulo' => 'Liquidaciones consistentes',
                'problema' => 'Dos ejecuciones simultáneas no deben consumir el mismo saldo ni duplicar una liquidación.',
                'descripcion' => 'El ejecutor coordina disponibilidad, transacciones, locks y revalidación, con idempotencia y pruebas concurrentes en PostgreSQL.',
                'consecuencia' => 'La consistencia se comprueba entre ejecuciones de ese circuito; no se promete resolver toda la concurrencia financiera del sistema.',
            ],
            [
                'titulo' => 'Dinero en unidades menores',
                'problema' => 'La representación decimal puede introducir ambigüedades en cálculos monetarios.',
                'descripcion' => 'Los importes se persisten como enteros para evitar ambigüedad decimal y sostener contratos monetarios reproducibles.',
                'consecuencia' => 'Cálculos y pruebas trabajan sobre una representación monetaria consistente.',
            ],
            [
                'titulo' => 'Tarjetas sin gastos duplicados',
                'problema' => 'Contar la compra y el pago de la tarjeta como gastos duplicaría su impacto.',
                'descripcion' => 'El consumo representa el gasto y el pago se modela como una transferencia hacia la tarjeta.',
                'consecuencia' => 'Pagar la deuda no vuelve a contabilizar el consumo como un nuevo gasto.',
            ],
            [
                'titulo' => 'Ownership probado',
                'problema' => 'Cada persona debe acceder únicamente a sus propios recursos financieros.',
                'descripcion' => 'Consultas y referencias user-scoped se cubren con pruebas adversariales sobre SQLite y PostgreSQL 18.',
                'consecuencia' => 'El aislamiento se verifica a nivel de aplicación; no implica RLS ni separación física por usuario.',
            ],
            [
                'titulo' => 'Evidencia sintética reproducible',
                'problema' => 'Mostrar el producto no debe exponer información de personas de la beta.',
                'descripcion' => 'Un dataset aislado y determinista genera capturas públicas sin utilizar usuarios ni información de la beta.',
                'consecuencia' => 'La evidencia visual se puede regenerar y revisar antes de publicarse.',
            ],
        ],
        'escenas' => [
            [
                'nombre' => 'Dashboard mobile',
                'archivo' => 'foco-dashboard-mobile.png',
                'grupo' => 'resumen',
                'ancho' => 390,
                'alto' => 844,
                'alt' => 'Dashboard mobile de Foco Finanzas con disponible, tarjeta, ingresos y cargos sintéticos.',
                'descripcion' => 'Resumen mensual con disponible, deuda e ingresos sintéticos.',
                'formato' => 'mobile',
                'principal' => true,
            ],
            [
                'nombre' => 'Plan mobile',
                'archivo' => 'foco-plan-mobile.png',
                'grupo' => 'planificacion',
                'ancho' => 390,
                'alto' => 844,
                'alt' => 'Plan financiero mobile con presupuestos y una meta de ahorro sintética.',
                'descripcion' => 'Presupuestos y meta de ahorro construidos con un escenario reproducible.',
                'formato' => 'mobile',
                'principal' => true,
            ],
            [
                'nombre' => 'Inversiones desktop',
                'archivo' => 'foco-inversiones-desktop.png',
                'grupo' => 'inversiones',
                'ancho' => 1440,
                'alto' => 900,
                'alt' => 'Reporte desktop de inversiones manuales con posiciones y resultado estimado sintético.',
                'descripcion' => 'Reporte manual de posiciones, valuación y resultado estimado.',
                'formato' => 'desktop',
                'principal' => true,
            ],
            [
                'nombre' => 'Movimientos mobile',
                'archivo' => 'foco-movimientos-mobile.png',
                'grupo' => 'movimientos',
                'ancho' => 390,
                'alto' => 844,
                'alt' => 'Historial mobile de movimientos sintéticos con una compra en cuotas.',
                'descripcion' => 'Movimientos, estados y cuotas dentro de un período reproducible.',
                'formato' => 'mobile',
                'principal' => false,
            ],
            [
                'nombre' => 'Tarjeta y ciclos mobile',
                'archivo' => 'foco-tarjeta-ciclos-mobile.png',
                'grupo' => 'tarjetas',
                'ancho' => 390,
                'alto' => 844,
                'alt' => 'Detalle mobile de una tarjeta sintética con sus ciclos de cierre y vencimiento.',
                'descripcion' => 'Ciclos de tarjeta y deuda modelados sin duplicar el gasto.',
                'formato' => 'mobile',
                'principal' => false,
            ],
            [
                'nombre' => 'Asistente desktop',
                'archivo' => 'foco-asistente-desktop.png',
                'grupo' => 'inversiones',
                'ancho' => 1366,
                'alto' => 768,
                'alt' => 'Asistente de Foco con una lectura mensual sintética y una herramienta de solo lectura.',
                'descripcion' => 'Lectura asistida local, read-only y sin asesoramiento financiero.',
                'formato' => 'desktop',
                'principal' => false,
            ],
        ],
    ],

    // Relevamiento local 7A y aclaraciones de autoría/publicación del titular (26/10/2026).
    // No acredita el último despliegue ni autoriza imágenes, código o datos empresariales.
    'caso_empresarial' => [
        'seo' => [
            'titulo' => 'Centralfarm y GlobalMed — Software empresarial | Nicolás Santa Ana',
            'descripcion' => 'Dos experiencias de desarrollo empresarial: reconstrucción integral de la web de Centralfarm y mantenimiento, optimización y evolución de GlobalMed.',
        ],
        'titulo' => 'Software para operaciones comerciales reales.',
        'presentacion' => 'Dos desafíos de desarrollo: reconstruir una aplicación empresarial y evolucionar un sistema existente. Mi trabajo en Centralfarm y GlobalMed combina procesos comerciales, interfaces operativas e integración de información.',
        'experiencias' => [
            [
                'id' => 'centralfarm',
                'nombre' => 'Centralfarm',
                'tipo' => 'Reconstrucción integral',
                'resumen' => 'Desarrollo completo de la nueva aplicación web.',
                'contexto' => 'Una aplicación para la operación comercial de una droguería, con recorridos diferenciados para clientes y vendedores.',
                'desafio' => 'Reconstruir la web para acompañar la consulta de productos, la preparación de pedidos y las necesidades de administración, respetando el contexto comercial existente.',
                'participacion' => 'Estuve a cargo de la reconstrucción completa y del desarrollo integral de la aplicación web actual: backend, interfaz y adaptación de los flujos comerciales. Esto no implica autoría de los sistemas externos ni de las reglas de negocio originales.',
                'resultado' => 'La aplicación reúne catálogo, armado y seguimiento de pedidos, importación de archivos y controles de acceso en una herramienta web para la operación.',
                'funcionalidades' => [
                    ['titulo' => 'Del catálogo al pedido', 'descripcion' => 'Consulta de productos, carrito, confirmación, historial y repetición de pedidos, con validaciones según el cliente y el contexto del vendedor.'],
                    ['titulo' => 'Importaciones con revisión', 'descripcion' => 'Carga de pedidos desde archivos, previsualización y confirmación, con devolución de las líneas no procesadas para poder revisarlas.'],
                    ['titulo' => 'Administración y consultas', 'descripcion' => 'Gestión de usuarios y permisos por módulo. La consulta de cuenta corriente tiene un alcance restringido y documentado como piloto, no una habilitación general.'],
                ],
                'stack' => ['PHP', 'Laravel 10', 'MySQL', 'Blade', 'JavaScript', 'Bootstrap', 'AG Grid'],
                'evidencia' => [
                    'Implementado' => 'Código de la aplicación, flujos comerciales y administración presentes en el repositorio. El historial registra intervenciones sobre pedidos, importación, consultas y permisos.',
                    'Validado' => 'Existen pruebas Unit y Feature y resultados históricos documentados. No se ejecutaron de nuevo las pruebas empresariales para publicar este caso.',
                    'Despliegue' => 'El proyecto está documentado como sistema en producción. La revisión local no certifica qué versión está desplegada actualmente.',
                    'Pendiente' => 'Parte de las mejoras recientes de pedidos y contexto de cliente sigue como trabajo local pendiente de commit; no se presenta como funcionalidad desplegada.',
                ],
            ],
            [
                'id' => 'globalmed',
                'nombre' => 'GlobalMed',
                'tipo' => 'Evolución de un sistema heredado',
                'resumen' => 'Mantenimiento, optimización y nuevas funcionalidades.',
                'contexto' => 'Una aplicación empresarial existente que acompaña pedidos, consultas comerciales e intercambio de información con otros sistemas.',
                'desafio' => 'Mejorar la experiencia y sumar capacidades sin tratar el sistema como una aplicación nueva ni reemplazar indiscriminadamente los contratos y comportamientos existentes.',
                'participacion' => 'Recibí una aplicación web heredada y realizo su mantenimiento, optimizaciones y desarrollo de nuevas funcionalidades. Mi intervención es de evolución progresiva, no de construcción desde cero ni de autoría de todo el código existente.',
                'resultado' => 'El trabajo combina continuidad del circuito comercial con mejoras de interfaz, validaciones y funciones de administración. Las implementaciones locales y las entregas documentadas se distinguen de la aceptación final en el entorno operativo.',
                'funcionalidades' => [
                    ['titulo' => 'Pedidos e importaciones', 'descripcion' => 'Mantenimiento de recorridos de pedido y formatos de intercambio, con restricciones comerciales y reglas configurables para la devolución de información importada.'],
                    ['titulo' => 'Interfaces para la operación', 'descripcion' => 'Las mejoras revisadas incluyen grillas, paginación, teclado y navegación, además de nuevas funciones administrativas. Su presencia en una copia local no demuestra su publicación en todos los entornos.'],
                    ['titulo' => 'Intercambio de información', 'descripcion' => 'La aplicación dispone de APIs para recibir datos por lotes y entregar pedidos con confirmación de recepción. El consumidor externo no formó parte del relevamiento: no se certifica aquí el circuito completo en producción.'],
                ],
                'stack' => ['PHP', 'Laravel 5.6', 'MySQL', 'Blade', 'JavaScript', 'jQuery', 'Bootstrap', 'AG Grid'],
                'evidencia' => [
                    'Implementado' => 'Las copias locales contienen módulos comerciales, interfaces de integración y mejoras administrativas. Conservan diferencias que deben revisarse antes de promover cambios.',
                    'Validado' => 'Hay validaciones dirigidas documentadas de acceso, importación e interfaz con datos de prueba. No equivalen a una comprobación actual del hosting ni de los sistemas externos.',
                    'Despliegue' => 'La documentación distingue una instalación operativa de otra usada para desarrollo y contingencia. No se consultaron servidores ni se verificó el último despliegue.',
                    'Pendiente' => 'La aceptación operativa de las entregas recientes y su promoción entre entornos requieren confirmación. No se presenta una modernización completa como terminada.',
                ],
            ],
        ],
        'capacidades' => [
            ['titulo' => 'Desarrollar con contexto', 'descripcion' => 'Traducir necesidades comerciales en una aplicación web, diferenciando reglas propias, sistemas externos y responsabilidades.'],
            ['titulo' => 'Integrar y preservar contratos', 'descripcion' => 'Trabajar con archivos y APIs sin perder de vista formatos, validaciones y recorridos que dependen de esa información.'],
            ['titulo' => 'Evolucionar sin empezar de cero', 'descripcion' => 'Diagnosticar un sistema existente, mejorar interfaces y sumar funciones con cambios acotados y verificables.'],
            ['titulo' => 'Validar y documentar', 'descripcion' => 'Combinar pruebas y comprobaciones funcionales, separando código implementado, evidencia de validación y estado desplegado.'],
        ],
    ],

    'proyectos' => [
        [
            'nombre' => 'Sistema de gestión para comedores corporativos',
            'contexto' => 'Producción',
            'problema' => 'Centralizar procesos operativos y administrativos que involucraban múltiples puntos de servicio y reglas de negocio.',
            'solucion' => 'Evolución de una plataforma web modular para administrar operaciones, consumos, reportes e integraciones.',
            'resultado' => 'Procesos operativos y administrativos reunidos en una plataforma capaz de acompañar múltiples puntos de servicio.',
            'stack' => ['PHP', 'Laravel', 'MySQL', 'Blade', 'JavaScript'],
            'responsabilidades' => 'Desarrollo full stack, mantenimiento evolutivo, análisis funcional, soporte productivo y documentación técnica.',
        ],
        [
            'nombre' => 'Terminales offline con sincronización',
            'contexto' => 'Producción',
            'problema' => 'Mantener la operación en ubicaciones con conectividad inestable sin perder consistencia en los datos.',
            'solucion' => 'Flujos offline-first con almacenamiento local y sincronización controlada al recuperar conexión.',
            'resultado' => 'Continuidad operativa ante conectividad intermitente, con recuperación y sincronización controlada de la información.',
            'stack' => ['Laravel', 'JavaScript', 'APIs REST', 'JSON', 'MySQL'],
            'responsabilidades' => 'Diseño del flujo de sincronización, endpoints, validaciones, resolución de conflictos y soporte en campo.',
        ],
        [
            'nombre' => 'PWA para operación de depósito',
            'contexto' => 'Producción',
            'problema' => 'Agilizar tareas de depósito desde dispositivos móviles y reducir errores de carga manual.',
            'solucion' => 'Interfaz web progresiva enfocada en recorridos rápidos, validación de operaciones y respuesta clara al usuario.',
            'resultado' => 'Flujos de depósito disponibles en dispositivos móviles, con validaciones orientadas a reducir errores de operación.',
            'stack' => ['PWA', 'Vue.js', 'JavaScript', 'Laravel', 'APIs REST'],
            'responsabilidades' => 'Frontend operativo, integración con APIs, pruebas de flujo y mejora de experiencia de uso.',
        ],
        [
            'nombre' => 'Plataforma web para droguería',
            'contexto' => 'Freelance',
            'problema' => 'Digitalizar procesos comerciales y operativos con información centralizada y trazable.',
            'solucion' => 'Aplicación web de gestión con módulos adaptados al circuito del negocio y controles de integridad.',
            'resultado' => 'Procesos comerciales y operativos centralizados en una herramienta web adaptada al circuito de la droguería.',
            'stack' => ['PHP', 'Laravel', 'MySQL', 'Blade', 'Bootstrap'],
            'responsabilidades' => 'Relevamiento, modelado, implementación full stack, despliegue y mantenimiento.',
        ],
    ],

    'cv' => [
        'archivo' => 'cv/Nicolas_Santa_Ana_CV_FullStack_Laravel.pdf',
        'nombre_descarga' => 'Nicolas_Santa_Ana_CV_FullStack_Laravel.pdf',
    ],

    'contacto' => [
        'email' => 'nmsantaana1994@gmail.com',
        'linkedin' => 'https://www.linkedin.com/in/nicosantaana/',
        'github' => 'https://github.com/nmsantaana1994',
        'ubicacion' => 'CABA, Buenos Aires, Argentina',
    ],
];
