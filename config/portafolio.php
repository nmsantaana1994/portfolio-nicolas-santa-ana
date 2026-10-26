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
        ['etiqueta' => 'Sobre mí', 'ancla' => 'sobre-mi'],
        ['etiqueta' => 'Contacto', 'ancla' => 'contacto'],
    ],

    'sobre_mi' => 'Desarrollador Full Stack con foco en PHP/Laravel, MySQL y JavaScript, orientado al desarrollo y mantenimiento de sistemas web de gestión, APIs REST e integraciones para productos en producción. Mi perfil combina backend Laravel con frontend web usando Blade, JavaScript, Vue.js, Bootstrap y Tailwind CSS e interfaces operativas.',

    'focos' => [
        ['titulo' => 'Full Stack Laravel', 'descripcion' => 'Soluciones web completas, desde el dominio y la persistencia hasta la experiencia de uso.'],
        ['titulo' => 'Frontend operativo', 'descripcion' => 'Interfaces claras y eficientes para flujos de trabajo cotidianos y usuarios reales.'],
        ['titulo' => 'Backend & APIs REST', 'descripcion' => 'Lógica de negocio, integraciones y endpoints mantenibles, seguros y bien documentados.'],
        ['titulo' => 'Bases de datos', 'descripcion' => 'Modelado relacional, consultas SQL e integridad de datos para sistemas de gestión.'],
        ['titulo' => 'Sistemas productivos', 'descripcion' => 'Mantenimiento evolutivo, soporte y mejora continua sobre aplicaciones en operación.'],
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
        'descripcion' => 'Aplicación web para integrar cuentas, movimientos, tarjetas, cuotas, presupuestos, metas, obligaciones e inversiones manuales, con IA asistiva de solo lectura.',
        'problema' => 'La información financiera personal suele quedar fragmentada entre saldos, consumos, cuotas, vencimientos, metas e inversiones, dificultando entender el disponible real y los compromisos del mes.',
        'solucion' => 'Diseñé un monolito modular que modela esas relaciones sin duplicar impactos: diferencia gastos y transferencias, conserva ciclos históricos, vincula metas con ahorro y mantiene la IA fuera de las mutaciones financieras.',
        'responsabilidades' => 'Definición de producto, modelado de dominio, backend Laravel, persistencia PostgreSQL, interfaz mobile-first, seguridad, tests, CI, Docker, staging, dataset sintético y documentación técnica.',
        'estado' => 'Beta privada activa en staging. Repositorio privado y producción pública todavía no operativa.',
        'stack' => ['PHP 8.4', 'Laravel 13', 'PostgreSQL 18', 'Blade', 'Tailwind CSS', 'JavaScript', 'Playwright', 'Docker', 'GitHub Actions'],
        'metricas' => [
            ['valor' => '604', 'etiqueta' => 'tests automatizados', 'detalle' => 'Línea base local del 31/07/2026'],
            ['valor' => '3', 'etiqueta' => 'jobs de CI', 'detalle' => 'SQLite, PostgreSQL y Browser'],
            ['valor' => '12', 'etiqueta' => 'capturas verificadas', 'detalle' => 'Seis escenas en claro y oscuro'],
            ['valor' => '48', 'etiqueta' => 'tablas restauradas', 'detalle' => 'Restore local con datos sintéticos'],
        ],
        'decisiones' => [
            [
                'titulo' => 'Dinero en unidades menores',
                'descripcion' => 'Los importes se persisten como enteros para evitar ambigüedad decimal y sostener contratos monetarios reproducibles.',
            ],
            [
                'titulo' => 'Tarjetas sin gastos duplicados',
                'descripcion' => 'El consumo representa el gasto y el pago se modela como una transferencia hacia la tarjeta.',
            ],
            [
                'titulo' => 'Ownership probado',
                'descripcion' => 'Consultas y referencias user-scoped se cubren con pruebas adversariales sobre SQLite y PostgreSQL 18.',
            ],
            [
                'titulo' => 'Evidencia sintética reproducible',
                'descripcion' => 'Un dataset aislado y determinista genera capturas públicas sin utilizar usuarios ni información de la beta.',
            ],
        ],
        'escenas' => [
            [
                'nombre' => 'Dashboard mobile',
                'archivo' => 'foco-dashboard-mobile.png',
                'alt' => 'Dashboard mobile de Foco Finanzas con disponible, tarjeta, ingresos y cargos sintéticos.',
                'descripcion' => 'Resumen mensual con disponible, deuda e ingresos sintéticos.',
                'formato' => 'mobile',
                'principal' => true,
            ],
            [
                'nombre' => 'Plan mobile',
                'archivo' => 'foco-plan-mobile.png',
                'alt' => 'Plan financiero mobile con presupuestos y una meta de ahorro sintética.',
                'descripcion' => 'Presupuestos y meta de ahorro construidos con un escenario reproducible.',
                'formato' => 'mobile',
                'principal' => true,
            ],
            [
                'nombre' => 'Inversiones desktop',
                'archivo' => 'foco-inversiones-desktop.png',
                'alt' => 'Reporte desktop de inversiones manuales con posiciones y resultado estimado sintético.',
                'descripcion' => 'Reporte manual de posiciones, valuación y resultado estimado.',
                'formato' => 'desktop',
                'principal' => true,
            ],
            [
                'nombre' => 'Movimientos mobile',
                'archivo' => 'foco-movimientos-mobile.png',
                'alt' => 'Historial mobile de movimientos sintéticos con una compra en cuotas.',
                'descripcion' => 'Movimientos, estados y cuotas dentro de un período reproducible.',
                'formato' => 'mobile',
                'principal' => false,
            ],
            [
                'nombre' => 'Tarjeta y ciclos mobile',
                'archivo' => 'foco-tarjeta-ciclos-mobile.png',
                'alt' => 'Detalle mobile de una tarjeta sintética con sus ciclos de cierre y vencimiento.',
                'descripcion' => 'Ciclos de tarjeta y deuda modelados sin duplicar el gasto.',
                'formato' => 'mobile',
                'principal' => false,
            ],
            [
                'nombre' => 'Asistente desktop',
                'archivo' => 'foco-asistente-desktop.png',
                'alt' => 'Asistente de Foco con una lectura mensual sintética y una herramienta de solo lectura.',
                'descripcion' => 'Lectura asistida local, read-only y sin asesoramiento financiero.',
                'formato' => 'desktop',
                'principal' => false,
            ],
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
