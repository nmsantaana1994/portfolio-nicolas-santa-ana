<?php

return [
    'seo' => [
        'titulo' => 'Nicolás Martín Santa Ana | Full Stack PHP/Laravel Developer',
        'descripcion' => 'Nicolás Martín Santa Ana, desarrollador Full Stack PHP/Laravel. Aplicaciones web para empresas, integración de sistemas y mantenimiento de software.',
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
        'presentacion' => 'Desarrollo aplicaciones web para gestionar el trabajo diario, conectar sistemas y mejorar el software que una empresa ya usa. Trabajo con PHP y Laravel, desde los datos y las reglas del negocio hasta las pantallas.',
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

    'sobre_mi' => 'Me interesa entender cómo trabaja una organización antes de diseñar una solución. Mi experiencia combina desarrollo, análisis de necesidades y soporte: converso con quienes usan el sistema, construyo las funciones que necesitan y acompaño su uso y evolución.',

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
                'solucion' => 'Puedo desarrollar una aplicación a medida para registrar información, organizar tareas y acompañar las reglas de tu negocio, desde los datos hasta las pantallas.',
                'evidencia' => 'Experiencia publicada en sistemas de gestión operativa y una plataforma web para droguería.',
                'ruta' => 'inicio',
                'ancla' => 'proyectos',
                'enlace' => 'Ver casos profesionales',
            ],
            [
                'titulo' => 'Integración y automatización',
                'problema' => 'Las herramientas no se comunican y parte del trabajo depende de trasladar o revisar información manualmente.',
                'solucion' => 'Puedo conectar aplicaciones para intercambiar pedidos, productos u otros datos mediante archivos o APIs, las interfaces que permiten comunicar sistemas. Las validaciones se adaptan al proceso de trabajo.',
                'evidencia' => 'Los casos publicados de gestión y droguería incluyen intercambio de información entre sistemas y validaciones comerciales.',
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
                'solucion' => 'Puedo incorporar pruebas automáticas, revisar los recorridos de uso y comprobar los cambios antes de publicarlos, con documentación para acompañar cada entrega.',
                'evidencia' => 'En Foco Finanzas utilizo pruebas automáticas y revisiones manuales. La integración continua ejecuta comprobaciones sobre los cambios enviados al repositorio.',
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
        ['titulo' => 'Entender la operación', 'descripcion' => 'Conversar con quienes usan el sistema, entender cómo trabajan y definir qué necesita resolver la aplicación.'],
        ['titulo' => 'Construir e integrar', 'descripcion' => 'Desarrollar la aplicación completa: datos, reglas y pantallas. Conectar herramientas para que puedan intercambiar información.'],
        ['titulo' => 'Acompañar la evolución', 'descripcion' => 'Comprobar cambios con pruebas, documentar las entregas y resolver incidencias mientras el software sigue en uso.'],
    ],

    'stack' => [
        'Backend / Laravel' => ['PHP', 'Laravel', 'Blade', 'Eloquent ORM', 'Artisan', 'Composer', 'APIs REST', 'JSON', 'JWT', 'Roles y permisos'],
        'Frontend / UI' => ['JavaScript', 'Vue.js', 'jQuery', 'AJAX', 'HTML5', 'CSS3', 'Bootstrap', 'Tailwind CSS', 'AG Grid', 'Chart.js', 'Vite'],
        'Base de datos' => ['MySQL', 'MariaDB', 'PostgreSQL', 'SQLite', 'SQL', 'Diseño relacional', 'Migraciones', 'Seeders', 'Índices', 'Claves foráneas', 'Transacciones'],
        'Herramientas, entornos y entrega' => ['Git', 'GitHub', 'GitLab', 'GitHub Actions', 'Docker local', 'AWS EC2', 'AWS S3', 'Railway', 'Vercel', 'IIS', 'Linux básico por consola'],
        'Prácticas' => ['Desarrollo integral de producto', 'Pruebas automatizadas', 'PHPUnit', 'Playwright', 'Integración continua', 'Código limpio', 'Documentación técnica', 'Análisis funcional', 'Soporte productivo', 'Mejora continua', 'Mantenimiento de sistemas reales'],
    ],

    'experiencias' => [
        [
            'empresa' => 'FoodService',
            'puesto' => 'Full Stack Developer PHP/Laravel',
            'resumen' => 'Desarrollo y mejoro aplicaciones para la gestión de comedores corporativos: construyo funciones con PHP/Laravel, adapto pantallas al trabajo diario y doy soporte a los sistemas en uso.',
        ],
        [
            'empresa' => 'Centralfarm',
            'puesto' => 'Freelance Full Stack Developer',
            'resumen' => 'Estuve a cargo de la reconstrucción integral de la aplicación web actual, desde los datos hasta las pantallas para consultar productos y preparar pedidos. Integré la web con sistemas externos, sin atribuirme su desarrollo ni las reglas comerciales preexistentes.',
        ],
        [
            'empresa' => 'GlobalMed',
            'puesto' => 'Freelance Full Stack Developer',
            'resumen' => 'Recibí una aplicación web existente y realizo mantenimiento, optimizaciones y nuevas funcionalidades. Trabajo sobre pedidos, consultas e intercambio de información, cuidando la continuidad del sistema y su evolución gradual.',
        ],
        [
            'empresa' => 'Report System',
            'puesto' => 'Front-End Developer / Soporte de Implementación',
            'resumen' => 'Construcción y ajuste de interfaces, acompañamiento de implementaciones y resolución de incidencias para asegurar una adopción estable del producto.',
        ],
    ],

    'proyecto_insignia' => [
        'nombre' => 'Foco Finanzas',
        'subtitulo' => 'Cuentas, cuotas y planificación en un mismo lugar',
        'contexto' => 'Proyecto propio · Beta privada',
        'descripcion' => 'Producto propio en beta privada para registrar ingresos y gastos, entender cuotas y vencimientos, y seguir presupuestos, metas e inversiones manuales.',
        'resumen_problema' => 'Saldos, cuotas y vencimientos separados dificultan entender el disponible real del mes.',
        'resumen_solucion' => 'Una aplicación para consultar la actividad del mes, organizar pagos y seguir el ahorro, sin contar el pago de la tarjeta como un gasto nuevo.',
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
        'presentacion' => 'En Centralfarm reconstruí la aplicación web para consultar productos y gestionar pedidos. En GlobalMed recibí un sistema existente y trabajo en su mantenimiento y mejora. Dos formas de acompañar la operación comercial con software.',
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
                'desafio' => 'Mejorar pantallas y sumar funciones sin interrumpir los recorridos de trabajo ni cambiar sin revisión la forma en que el sistema intercambia información.',
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
            ['titulo' => 'Conectar sistemas con cuidado', 'descripcion' => 'Intercambiar información mediante archivos y APIs, respetando los formatos, las validaciones y las tareas que dependen de esos datos.'],
            ['titulo' => 'Evolucionar sin empezar de cero', 'descripcion' => 'Diagnosticar un sistema existente, mejorar interfaces y sumar funciones con cambios acotados y verificables.'],
            ['titulo' => 'Validar y documentar', 'descripcion' => 'Combinar pruebas y comprobaciones funcionales, separando código implementado, evidencia de validación y estado desplegado.'],
        ],
    ],

    // Alcance proporcionado por el titular. No acredita una versión instalada ni un despliegue actual.
    'caso_terminales' => [
        'seo' => [
            'titulo' => 'Terminales y continuidad operativa | Nicolás Santa Ana',
            'descripcion' => 'Desarrollo de una plataforma central y un agente local para registrar consumos, aplicar reglas e integrar operaciones con conectividad limitada.',
        ],
        'titulo' => 'Terminales y continuidad operativa',
        'presentacion' => 'Una plataforma y un agente local para identificar personas, registrar consumos y conectar los puntos de atención con la administración, incluso en circuitos con conectividad limitada.',
        'problema' => 'En un punto de atención, cada consumo requiere identificar a la persona y validar sus condiciones de uso. Una conexión inestable agrega otra necesidad: conservar la información y saber qué queda pendiente de comunicar.',
        'solucion' => 'Creé Terminales y Agente Terminales para coordinar ese trabajo: la plataforma central administra y reúne la actividad; el agente local acompaña el registro y el intercambio de información desde cada equipo.',
        'participacion' => 'Creé y desarrollé desde cero Terminales y Agente Terminales. Soy responsable del desarrollo de ambos sistemas: datos, backend, interfaz operativa, integración y evolución.',
        'colaboracion' => 'Durante mis ausencias, otras personas realizaron intervenciones puntuales.',
        'capacidades' => [
            ['titulo' => 'Desarrollo de producto', 'descripcion' => 'Convertir una necesidad operativa en dos aplicaciones que trabajan juntas.'],
            ['titulo' => 'Integración de sistemas', 'descripcion' => 'Relacionar el registro local, la administración y la información empresarial.'],
            ['titulo' => 'Evolución y mantenimiento', 'descripcion' => 'Acompañar el uso cotidiano, el diagnóstico y las actualizaciones del software.'],
        ],
        'recorrido' => [
            ['icono' => 'identidad', 'titulo' => 'La persona se identifica', 'descripcion' => 'La terminal recibe la identificación para iniciar la operación.'],
            ['icono' => 'reglas', 'titulo' => 'Se validan las condiciones', 'descripcion' => 'El sistema comprueba las reglas que corresponden al contexto de uso.'],
            ['icono' => 'registro', 'titulo' => 'Se registra el consumo', 'descripcion' => 'La operación conserva su identificación y su estado para poder seguirla.'],
            ['icono' => 'local', 'titulo' => 'El agente conserva el registro', 'descripcion' => 'Si falta conexión y dispone de la información necesaria, el agente mantiene el registro local.'],
            ['icono' => 'sincronizacion', 'titulo' => 'La información se concilia', 'descripcion' => 'Los pendientes se sincronizan y concilian con el sistema central cuando corresponde.'],
        ],
        'nodos' => [
            ['nombre' => 'Terminal operativa', 'detalle' => 'Identificación y registro en el punto de atención.', 'tecnologia' => 'Interfaz de operación'],
            ['nombre' => 'Agente local', 'detalle' => 'Persistencia local y coordinación del intercambio con el sistema central.', 'tecnologia' => 'C# / .NET · SQLite'],
            ['nombre' => 'Sistema central', 'detalle' => 'Reglas, administración, seguimiento e integración empresarial.', 'tecnologia' => 'Laravel · MySQL'],
        ],
        'calidad' => [
            'Persistencia local' => 'SQLite conserva información en el equipo para los circuitos que pueden resolverse localmente.',
            'Identificadores y estados' => 'Permiten seguir una operación y distinguir lo registrado localmente de lo comunicado al sistema central.',
            'Reintentos y recuperación' => 'El intercambio contempla pendientes y reintentos para recuperar la comunicación.',
            'Pruebas específicas' => 'Pruebas específicas acompañan la validación de los comportamientos del circuito.',
        ],
        'evolucion' => 'Edge continúa en desarrollo y laboratorio. Es una línea de evolución separada: sus funciones no se presentan como parte del circuito actual.',
    ],

    // Información funcional y autoría confirmadas por el titular para el caso público.
    'caso_sgm_healthy' => [
        'seo' => [
            'titulo' => 'SGM + Healthy — Planificación y comensales | Nicolás Santa Ana',
            'descripcion' => 'Dos aplicaciones desarrolladas por Nicolás Santa Ana: SGM para planificar menús y Healthy para consultar información y registrar comidas.',
        ],
        'titulo' => 'De la planificación del menú a la experiencia del comensal',
        'presentacion' => 'Desarrollé dos aplicaciones relacionadas: SGM organiza la planificación interna de menús y Healthy acerca esa información a las personas que los consultan.',
        'problema' => 'Planificar para distintas operaciones implica coordinar menús, recetas, cantidades y revisiones. Esa información también tiene que estar disponible para quienes consultan qué van a comer.',
        'solucion' => 'SGM acompaña la gestión de los equipos internos. Healthy presenta menús, recetas y contenido al comensal, con su propio perfil y registro personal de comidas. Dos responsabilidades distintas dentro de un mismo proceso.',
        'aplicaciones' => [
            [
                'nombre' => 'SGM', 'ambito' => 'Equipos internos',
                'titulo' => 'Organizar, revisar y publicar.',
                'descripcion' => 'Planificación semanal y menús generales que se adaptan por operación, con cantidades, recetas e ingredientes.',
                'funciones' => ['Revisión y aprobación de propuestas hasta el cierre y la publicación.', 'Históricos y proyecciones para acompañar el trabajo de planificación.', 'Gestión relacionada con costos, compras e integración empresarial.'],
            ],
            [
                'nombre' => 'Healthy', 'ambito' => 'Comensales',
                'titulo' => 'Consultar y llevar un registro propio.',
                'descripcion' => 'Menús diarios y semanales, recetas y contenido sobre alimentación en una interfaz orientada al usuario final.',
                'funciones' => ['Autenticación propia y gestión de perfil.', 'Registro personal de comidas, historial y resúmenes de consumos.', 'Una experiencia de consulta y registro, no un producto médico ni una promesa de resultados de salud.'],
            ],
        ],
        'recorrido' => [
            ['aplicacion' => 'SGM', 'titulo' => 'Se planifica el menú', 'descripcion' => 'Los equipos internos organizan menús y recetas para la semana.'],
            ['aplicacion' => 'SGM', 'titulo' => 'Se adapta y publica', 'descripcion' => 'La información se adapta por operación y se publica según el proceso correspondiente.'],
            ['aplicacion' => 'Healthy', 'titulo' => 'La información llega a la consulta', 'descripcion' => 'Healthy utiliza la información de menús, recetas y contenido disponible desde SGM.'],
            ['aplicacion' => 'Healthy', 'titulo' => 'El comensal elige qué consultar', 'descripcion' => 'Puede recorrer menús diarios y semanales y ver recetas.'],
            ['aplicacion' => 'Healthy', 'titulo' => 'La experiencia se vuelve personal', 'descripcion' => 'El perfil y el registro de comidas complementan la consulta con historial y resúmenes propios.'],
        ],
        'participacion' => 'Creé y desarrollé SGM y Healthy desde sus bases. Soy el desarrollador principal de SGM y mi trabajo en ambas aplicaciones abarca análisis de procesos, modelado de información, backend, interfaces e integraciones correspondientes.',
        'capacidades' => [
            ['titulo' => 'Traducir procesos', 'descripcion' => 'Convertir tareas de planificación, revisión y publicación en funcionalidades y estados de trabajo.'],
            ['titulo' => 'Conectar aplicaciones', 'descripcion' => 'Relacionar información de un mismo dominio sin confundir las responsabilidades de cada sistema.'],
            ['titulo' => 'Diseñar para distintos perfiles', 'descripcion' => 'Construir interfaces para equipos internos y usuarios finales, y acompañar su evolución y mantenimiento.'],
        ],
        'tecnica' => [
            'Aplicaciones y persistencia' => 'SGM utiliza Laravel 10; Healthy, Laravel 11. Ambas aplicaciones emplean PHP, MySQL y Blade. SGM también incluye herramientas de administración del dominio Healthy.',
            'Responsabilidades y autenticación' => 'Healthy tiene autenticación propia. La relación entre aplicaciones no supone inicio de sesión único, una base de datos compartida por todos los módulos ni sincronización bidireccional completa.',
            'Estados e históricos' => 'En SGM, los workflows acompañan revisión, aprobación, cierre y publicación de menús, con conservación de históricos.',
            'Pruebas' => 'SGM dispone de pruebas específicas de workflows, estados, menús y exportaciones. El relevamiento de Healthy no identificó cobertura específica de negocio; no se presenta como una suite funcional extensa.',
            'Alcance de implementación' => 'Las funcionalidades descritas fueron identificadas en el relevamiento. Su habilitación y las integraciones disponibles dependen del entorno; no se afirma que todos los módulos estén desplegados en producción.',
        ],
    ],

    'caso_plataformas_operativas' => [
        'seo' => [
            'titulo' => 'ZonalApp + CateringOnline — Operaciones y pedidos | Nicolás Santa Ana',
            'descripcion' => 'Creación y evolución de ZonalApp y desarrollo colaborativo de CateringOnline: plataformas internas, interfaces móviles e integración de sistemas.',
        ],
        'titulo' => 'Aplicaciones empresariales para organizar operaciones y pedidos',
        'presentacion' => 'Dos experiencias independientes: una plataforma que reúne procesos de distintos sistemas y una aplicación de pedidos semanales construida en equipo.',
        'resumen_home' => 'Una plataforma operativa creada desde sus bases y una aplicación de pedidos desarrollada en equipo.',
        'experiencias' => [
            [
                'id' => 'zonalapp', 'nombre' => 'ZonalApp', 'tipo' => 'Creación y evolución',
                'titulo' => 'Un punto de acceso para la operación.',
                'descripcion' => 'Los responsables de distintas operaciones necesitan consultar información y resolver tareas de varias áreas. ZonalApp reúne esos recorridos en un portal, con accesos según el perfil y la operación de cada persona.',
                'participacion' => 'Creé ZonalApp y desarrollé la aplicación desde sus bases. Participé en su evolución junto con otro desarrollador que se sumó posteriormente.',
                'funciones' => ['Consultas de cantidades, reportes y conciliaciones.', 'Pedidos, recepción de productos y reclamos.', 'Novedades de personal, cartelería y acceso a funciones de otros sistemas.'],
                'tecnica' => [
                    'Aplicación y datos' => 'Laravel 12, PHP, MySQL, Blade y Tailwind. Servicios HTTP integran distintas fuentes de información.',
                    'Acceso por contexto' => 'Autenticación, roles y permisos según perfiles y operaciones. Incluye acceso a otros sistemas mediante SSO.',
                    'Validación y alcance' => 'Existen pruebas específicas para distintos módulos. Las capacidades identificadas no implican que todos los módulos estén habilitados en producción ni un funcionamiento offline general.',
                ],
            ],
            [
                'id' => 'cateringonline', 'nombre' => 'CateringOnline', 'tipo' => 'Desarrollo colaborativo',
                'titulo' => 'La semana de comidas, desde el móvil.',
                'descripcion' => 'CateringOnline organiza pedidos semanales de comidas: permite consultar menús, seleccionar opciones y administrar cambios según las condiciones del lugar de trabajo y su calendario.',
                'participacion' => 'Desarrollé CateringOnline junto con mi jefe. Mis contribuciones incluyen la interfaz móvil, avisos, sincronización de ajustes, tratamiento de feriados y mejoras de consultas y flujos.',
                'funciones' => ['Selección semanal y carrito, con solicitudes individuales y generales.', 'Modificaciones, cancelaciones, avisos y reportes.', 'Reglas según empresa, sucursal, sector, turno y calendario.'],
                'recuperacion' => 'Ante problemas de comunicación, los ajustes pendientes se conservan y se reintentan. Los resultados se concilian y las situaciones ambiguas contemplan revisión manual.',
                'tecnica' => [
                    'Interfaz y persistencia' => 'Laravel 11, Livewire 3, Blade, Tailwind y MySQL. Interfaces adaptadas a móviles para los recorridos de pedido.',
                    'Integración y recuperación' => 'Integración con el sistema operativo de Consumos, con persistencia de ajustes pendientes, reintentos, conciliación y revisión manual de casos ambiguos. No implica consistencia absoluta entre bases ni ausencia universal de duplicaciones.',
                    'Pruebas específicas' => 'Existen pruebas del carrito, los ajustes y la recuperación. Su alcance es específico: no se presenta la sincronización como perfecta.',
                ],
            ],
        ],
        'capacidades' => [
            ['titulo' => 'Construir y evolucionar', 'descripcion' => 'Desarrollo Full Stack, modelado de procesos e interfaces empresariales, con mantenimiento y evolución de funcionalidades.'],
            ['titulo' => 'Integrar con control de acceso', 'descripcion' => 'Relacionar información de sistemas existentes y ofrecer recorridos según perfiles, permisos y operaciones.'],
            ['titulo' => 'Colaborar y recuperar', 'descripcion' => 'Trabajar en equipo y tratar errores de comunicación con estados, reintentos y revisión de resultados.'],
        ],
    ],

    'proyectos' => [
        [
            'nombre' => 'Sistema de gestión para comedores corporativos',
            'contexto' => 'Producción',
            'problema' => 'Centralizar procesos operativos y administrativos que involucraban múltiples puntos de servicio y reglas de negocio.',
            'solucion' => 'Desarrollo y mejora de una aplicación web para administrar operaciones, consumos y reportes, y conectar información con otros sistemas.',
            'resultado' => 'Procesos operativos y administrativos reunidos en una plataforma capaz de acompañar múltiples puntos de servicio.',
            'stack' => ['PHP', 'Laravel', 'MySQL', 'Blade', 'JavaScript'],
            'responsabilidades' => 'Desarrollo de funciones y pantallas, análisis de necesidades, mantenimiento, soporte a los sistemas en uso y documentación técnica.',
        ],
        [
            'nombre' => 'Terminales offline con sincronización',
            'ruta_caso' => 'proyectos.terminales',
            'contexto' => 'Producción',
            'problema' => 'Registrar consumos cuando la conexión es inestable.',
            'solucion' => 'Una plataforma central y un agente que conserva información en el equipo.',
            'resultado' => 'Seguimiento centralizado y continuidad local en los circuitos que cuentan con la información necesaria.',
            'stack' => ['Laravel', 'JavaScript', 'APIs REST', 'JSON', 'MySQL', 'C# / .NET', 'SQLite'],
            'responsabilidades' => 'Creé ambos sistemas desde cero y soy responsable de su desarrollo.',
        ],
        [
            'nombre' => 'PWA para operación de depósito',
            'contexto' => 'Producción',
            'problema' => 'Agilizar tareas de depósito desde dispositivos móviles y reducir errores de carga manual.',
            'solucion' => 'Una aplicación web que se puede instalar desde el navegador, con pantallas adaptadas al trabajo móvil y validación de las operaciones.',
            'resultado' => 'Flujos de depósito disponibles en dispositivos móviles, con validaciones orientadas a reducir errores de operación.',
            'stack' => ['PWA', 'Vue.js', 'JavaScript', 'Laravel', 'APIs REST'],
            'responsabilidades' => 'Desarrollo de pantallas para la operación, conexión con los servicios del sistema y pruebas de los recorridos de uso.',
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
        [
            'nombre' => 'SGM + Healthy: planificación y experiencia del comensal',
            'contexto' => 'Desarrollo empresarial',
            'ruta_caso' => 'proyectos.sgm-healthy',
            'enlace_caso' => 'SGM + Healthy: ver caso completo',
            'ancho_completo' => true,
            'problema' => 'Coordinar la planificación de menús y la información que consulta el comensal.',
            'solucion' => 'Dos aplicaciones relacionadas, una para los equipos internos y otra para el usuario final.',
            'responsabilidades' => 'Creé ambas aplicaciones desde sus bases: procesos, datos, backend, interfaces e integraciones.',
            'resultado' => 'Planificación, publicación y consulta conectadas, con responsabilidades propias para cada aplicación.',
            'stack' => ['PHP', 'Laravel 10', 'Laravel 11', 'MySQL', 'Blade'],
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
