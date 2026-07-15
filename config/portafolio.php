<?php

return [
    'seo' => [
        'titulo' => 'Nicolás Martín Santa Ana | Full Stack PHP/Laravel Developer',
        'descripcion' => 'Portfolio de Nicolás Martín Santa Ana, Full Stack PHP/Laravel Developer especializado en APIs REST y sistemas web en producción.',
        'tipo' => 'website',
        'locale' => 'es_AR',
    ],

    'persona' => [
        'nombre' => 'Nicolás Martín Santa Ana',
        'titulo' => 'Full Stack PHP/Laravel Developer',
        'presentacion' => 'Desarrollo sistemas web de gestión, APIs REST e interfaces operativas con Laravel, JavaScript, MySQL, Blade y Vue.js.',
        'ubicacion' => 'CABA, Buenos Aires, Argentina',
    ],

    'navegacion' => [
        ['etiqueta' => 'Sobre mí', 'ancla' => 'sobre-mi'],
        ['etiqueta' => 'Stack', 'ancla' => 'stack'],
        ['etiqueta' => 'Experiencia', 'ancla' => 'experiencia'],
        ['etiqueta' => 'Proyectos', 'ancla' => 'proyectos'],
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

    'proyectos' => [
        [
            'nombre' => 'Sistema de gestión para comedores corporativos',
            'problema' => 'Centralizar procesos operativos y administrativos que involucraban múltiples puntos de servicio y reglas de negocio.',
            'solucion' => 'Evolución de una plataforma web modular para administrar operaciones, consumos, reportes e integraciones.',
            'stack' => ['PHP', 'Laravel', 'MySQL', 'Blade', 'JavaScript'],
            'responsabilidades' => 'Desarrollo full stack, mantenimiento evolutivo, análisis funcional, soporte productivo y documentación técnica.',
        ],
        [
            'nombre' => 'Terminales offline con sincronización',
            'problema' => 'Mantener la operación en ubicaciones con conectividad inestable sin perder consistencia en los datos.',
            'solucion' => 'Flujos offline-first con almacenamiento local y sincronización controlada al recuperar conexión.',
            'stack' => ['Laravel', 'JavaScript', 'APIs REST', 'JSON', 'MySQL'],
            'responsabilidades' => 'Diseño del flujo de sincronización, endpoints, validaciones, resolución de conflictos y soporte en campo.',
        ],
        [
            'nombre' => 'PWA para operación de depósito',
            'problema' => 'Agilizar tareas de depósito desde dispositivos móviles y reducir errores de carga manual.',
            'solucion' => 'Interfaz web progresiva enfocada en recorridos rápidos, validación de operaciones y respuesta clara al usuario.',
            'stack' => ['PWA', 'Vue.js', 'JavaScript', 'Laravel', 'APIs REST'],
            'responsabilidades' => 'Frontend operativo, integración con APIs, pruebas de flujo y mejora de experiencia de uso.',
        ],
        [
            'nombre' => 'Plataforma web para droguería',
            'problema' => 'Digitalizar procesos comerciales y operativos con información centralizada y trazable.',
            'solucion' => 'Aplicación web de gestión con módulos adaptados al circuito del negocio y controles de integridad.',
            'stack' => ['PHP', 'Laravel', 'MySQL', 'Blade', 'Bootstrap'],
            'responsabilidades' => 'Relevamiento, modelado, implementación full stack, despliegue y mantenimiento.',
        ],
        [
            'nombre' => 'Challenge técnico Laravel / API REST',
            'problema' => 'Resolver un dominio acotado exponiendo operaciones consistentes y verificables mediante una API.',
            'solucion' => 'API REST estructurada por responsabilidades, con validaciones, persistencia relacional y respuestas HTTP claras.',
            'stack' => ['PHP', 'Laravel', 'Eloquent', 'MySQL', 'JSON'],
            'responsabilidades' => 'Diseño de arquitectura, implementación de endpoints, manejo de errores, pruebas y documentación.',
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
