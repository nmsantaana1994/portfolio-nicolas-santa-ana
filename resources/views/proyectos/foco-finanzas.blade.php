@extends('layouts.portafolio')

@section('contenido')
    @php($proyecto = $portafolio['proyecto_insignia'])
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1" data-galeria-foco>
        <section class="fondo-hero border-b border-slate-200 py-6 sm:py-16">
            <div class="foco-presentacion mx-auto grid max-w-7xl gap-6 px-5 sm:px-8 md:grid-cols-[minmax(0,1.25fr)_minmax(0,0.75fr)] md:items-center md:gap-x-10 lg:gap-x-16 lg:px-10">
                <div class="foco-intro">
                    <a href="{{ route('inicio', [], false) }}#foco-finanzas" class="inline-flex min-h-11 items-center text-sm font-semibold text-acento-700 underline underline-offset-4">@include('portafolio.parciales.indicador-enlace', ['direccion' => 'izquierda']) Volver al portfolio</a>
                    <p class="mt-6 text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Caso de estudio · {{ $proyecto['contexto'] }}</p>
                    <h1 class="mt-4 text-4xl leading-tight font-bold tracking-tight text-tinta-950 sm:text-5xl lg:text-6xl">Foco Finanzas: del movimiento diario a la planificación financiera.</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-tinta-600">{{ $proyecto['presentacion_caso'] }}</p>
                </div>
                @include('portafolio.parciales.captura-foco', ['escena' => $proyecto['escenas'][0], 'prioritaria' => true])
                <div class="foco-detalle">
                    <p class="mt-4 max-w-2xl leading-7 text-tinta-600">Diseñé y desarrollé el producto completo: modelo de datos, lógica financiera, interfaz, pruebas y entrega a una beta privada.</p>
                    <a href="#producto-en-uso" class="hero-accion mt-6 inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 font-semibold text-white hover:bg-acento-600">Explorar el producto @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])</a>
                    <div class="mt-5 rounded-xl border border-slate-200 bg-white/80 p-3 sm:p-4">
                        <p class="text-sm font-semibold text-tinta-950">Tema de las capturas</p>
                        <div class="selector-capturas mt-2 inline-flex rounded-lg bg-tinta-950 p-1" role="group" aria-label="Tema de las capturas">
                            <button type="button" class="min-h-11 rounded-md px-4 text-sm font-semibold text-slate-300" aria-pressed="false" data-tema-foco="light">Claro</button>
                            <button type="button" class="min-h-11 rounded-md bg-white px-4 text-sm font-semibold text-tinta-950" aria-pressed="true" data-tema-foco="dark">Oscuro</button>
                        </div>
                        <p class="mt-3 text-xs leading-5 text-tinta-600">Todos los datos visibles son sintéticos. Capturas históricas del 17/07/2026: seleccioná una imagen para ampliarla; el tema sólo cambia las capturas.</p>
                    </div>
                </div>
            </div>
        </section>

        <nav class="border-b border-slate-200 bg-white" aria-label="Contenido del caso">
            <div class="mx-auto flex max-w-7xl flex-wrap gap-x-6 gap-y-1 px-5 py-4 text-sm font-semibold text-acento-700 sm:px-8 lg:px-10">
                @foreach (['problema-solucion' => 'Problema y solución', 'producto-en-uso' => 'Producto', 'participacion' => 'Mi aporte', 'decisiones' => 'Decisiones', 'calidad' => 'Calidad y entrega'] as $ancla => $etiqueta)
                    <a href="#{{ $ancla }}" class="inline-flex min-h-11 items-center underline decoration-transparent underline-offset-4 hover:decoration-current">{{ $etiqueta }}</a>
                @endforeach
            </div>
        </nav>

        <section id="problema-solucion" class="scroll-mt-24 py-14 sm:py-20" aria-labelledby="titulo-problema">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">El punto de partida</p>
                <h2 id="titulo-problema" class="mt-3 max-w-3xl text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Los movimientos aislados no cuentan toda la historia.</h2>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <article class="superficie-tarjeta rounded-2xl border border-slate-200 p-6 sm:p-8">
                        <h3 class="font-bold text-tinta-950">El problema</h3>
                        <p class="mt-3 leading-7 text-tinta-600">{{ $proyecto['problema'] }}</p>
                    </article>
                    <article class="rounded-2xl border border-blue-100 bg-acento-50 p-6 sm:p-8">
                        <h3 class="font-bold text-tinta-950">La respuesta del producto</h3>
                        <p class="mt-3 leading-7 text-tinta-600">{{ $proyecto['solucion'] }}</p>
                    </article>
                </div>
                <p class="mt-6 max-w-3xl text-sm leading-6 text-tinta-600">El alcance es la organización y lectura de información financiera personal: no promete sincronización bancaria automática ni cotizaciones en tiempo real.</p>
            </div>
        </section>

        <section id="producto-en-uso" class="scroll-mt-24 border-y border-slate-200 bg-slate-50 py-14 sm:py-20" aria-labelledby="titulo-producto">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Producto en uso · Galería</p>
                <h2 id="titulo-producto" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">De registrar a comprender y planificar.</h2>
                <p class="mt-4 max-w-2xl leading-7 text-tinta-600">{{ $proyecto['descripcion'] }}</p>
                <p class="mt-4 max-w-3xl rounded-xl border border-blue-100 bg-acento-50 p-4 text-sm leading-6 text-tinta-600">{{ $proyecto['nota_visual'] }}</p>
                <div class="mt-10 space-y-12 sm:space-y-16">
                    @foreach ($proyecto['funcionalidades'] as $grupo => $funcionalidad)
                        <article class="grid min-w-0 gap-6 border-t border-slate-200 pt-8 md:grid-cols-[minmax(0,0.85fr)_minmax(0,1.15fr)] md:gap-12">
                            <div>
                                <p class="text-sm font-bold text-acento-700">0{{ $loop->iteration }}</p>
                                <h3 class="mt-3 text-2xl font-bold tracking-tight text-tinta-950">{{ $funcionalidad['titulo'] }}</h3>
                                <p class="mt-4 max-w-lg leading-7 text-tinta-600">{{ $funcionalidad['descripcion'] }}</p>
                            </div>
                            <div class="min-w-0 space-y-6">
                                @foreach ($proyecto['escenas'] as $escena)
                                    @if ($escena['grupo'] === $grupo)
                                        @include('portafolio.parciales.captura-foco', ['escena' => $escena, 'prioritaria' => false])
                                    @endif
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="border-b border-slate-200 bg-slate-50 pb-14 sm:pb-20" aria-label="Experiencia, privacidad y administración">
            <div class="mx-auto grid max-w-7xl gap-5 px-5 sm:px-8 lg:grid-cols-3 lg:px-10">
                @foreach ($proyecto['capacidades'] as $capacidad)
                        <article class="superficie-tarjeta rounded-2xl border border-slate-200 bg-white p-6">
                        <h2 class="text-lg font-bold text-tinta-950">{{ $capacidad['titulo'] }}</h2>
                        <p class="mt-3 text-sm leading-7 text-tinta-600">{{ $capacidad['descripcion'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="participacion" class="scroll-mt-24 py-14 sm:py-20" aria-labelledby="titulo-participacion">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Mi participación</p>
                <h2 id="titulo-participacion" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Construir el producto y sostener su evolución.</h2>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-tinta-600">{{ $proyecto['responsabilidades'] }}</p>
                <p class="mt-4 max-w-3xl leading-7 text-tinta-600">El backend se organiza como un monolito modular: una aplicación Laravel con dominios financieros relacionados. Reproduzco los defectos con datos sintéticos y valido historia, monedas y concurrencia antes de entregar cambios.</p>
                <ul class="mt-6 flex flex-wrap gap-2" aria-label="Tecnologías del proyecto">
                    @foreach ($proyecto['stack'] as $tecnologia)
                        <li class="rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-medium text-tinta-700">{{ $tecnologia }}</li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section id="decisiones" class="scroll-mt-24 bg-tinta-950 py-14 text-white sm:py-20" aria-labelledby="titulo-decisiones">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-blue-300">Decisiones técnicas</p>
                <h2 id="titulo-decisiones" class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">Reglas claras antes que complejidad accidental.</h2>
                <div class="mt-8 grid gap-5 lg:grid-cols-2">
                    @foreach ($proyecto['decisiones'] as $decision)
                        <article class="rounded-2xl border border-white/15 bg-white/5 p-6 sm:p-8">
                            <h3 class="text-xl font-bold">{{ $decision['titulo'] }}</h3>
                            <dl class="mt-5 space-y-4 text-sm leading-6">
                                @foreach (['problema' => 'Problema', 'descripcion' => 'Decisión', 'consecuencia' => 'Consecuencia práctica'] as $campo => $etiqueta)
                                    <div><dt class="font-bold text-blue-200">{{ $etiqueta }}</dt><dd class="mt-1 text-slate-300">{{ $decision[$campo] }}</dd></div>
                                @endforeach
                            </dl>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="calidad" class="scroll-mt-24 py-14 sm:py-20" aria-labelledby="titulo-calidad">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Calidad y entrega</p>
                <h2 id="titulo-calidad" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Probar las reglas, cuidar cada entrega.</h2>
                <p class="mt-5 max-w-3xl leading-7 text-tinta-600">Las pruebas comprueban reglas financieras, flujos de uso y operaciones simultáneas. La integración continua valida cada entrega; la revisión manual completa la comprobación de la experiencia de uso.</p>
                <p class="mt-4 max-w-3xl leading-7 text-tinta-600">PHPUnit y Playwright respaldan este proceso. GitHub Actions mantiene tres jobs de Quality sobre un runner Linux self-hosted: SQLite, PostgreSQL 18 y Browser. La entrega a staging en Railway combina integración por PR, despliegue y comprobaciones manuales.</p>
                <div class="mt-8 rounded-2xl border border-blue-100 bg-acento-50 p-6 sm:p-8">
                    <h3 class="text-lg font-bold text-tinta-950">Validaciones documentadas · octubre de 2026</h3>
                    <p class="mt-2 text-sm leading-6 text-tinta-600">Resultados históricos del 10/10/2026, separados por motor de base de datos. Los conteos no se suman entre sí e incluyen las pruebas omitidas de cada ejecución.</p>
                    <dl class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($proyecto['metricas'] as $metrica)
                            <div><dt class="text-sm font-semibold text-tinta-700">{{ $metrica['etiqueta'] }}</dt><dd class="mt-2 text-4xl font-bold text-acento-700">{{ $metrica['valor'] }}</dd><dd class="mt-2 text-xs leading-5 text-tinta-600">{{ $metrica['detalle'] }}</dd></div>
                        @endforeach
                    </dl>
                </div>
                <details class="group mt-6 rounded-2xl border border-slate-200" data-alcance-evidencia>
                    <summary class="cursor-pointer rounded-2xl px-5 py-5 font-semibold text-acento-700">Pruebas, recuperación y seguridad</summary>
                    <div class="border-t border-slate-200 p-5 sm:p-6">
                        <h3 class="font-bold text-tinta-950">Pruebas y entrega</h3>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">PHPUnit cubre pruebas Unit y Feature, incluida concurrencia en PostgreSQL. Playwright comprueba navegación, renderizado, foco, teclado y responsive en Chromium desktop y mobile; no acredita todos los navegadores ni todos los circuitos financieros persistidos. La suite Browser completa sigue siendo la referencia de los PR; los perfiles reducidos y el piloto paralelo Docker permanecen experimentales y manuales.</p>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">Docker es el entorno principal de desarrollo de Foco, con Laragon como alternativa. Las comprobaciones automáticas se complementan con una revisión funcional y visual.</p>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">La evidencia Browser documentada del 20/10/2026 registra 171 casos aprobados y 11 omitidos en una ejecución full. El piloto critical de esa fecha aprobó 18 y omitió 4: es otra selección, no una ampliación de cobertura ni un reemplazo de full. Estos resultados proceden de la documentación del proyecto; no se volvieron a ejecutar para elaborar este caso.</p>
                        <h3 class="mt-6 font-bold text-tinta-950">Recuperación</h3>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">En julio se validó un restore local sintético de 48 tablas. En septiembre, un ejercicio posterior demostró backup real → restauración aislada → aplicación operativa e invariantes verificadas, con resultado «utilizable con limitaciones» y cierre documentado el 30/09/2026. No acredita recuperación integral de archivos adjuntos, servicios externos ni un plan completo de disaster recovery.</p>
                        <h3 class="mt-6 font-bold text-tinta-950">Seguridad y privacidad</h3>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-tinta-600">La seguridad combina autorización por propietario, MFA administrativo, revocación de sesiones, reautenticación y auditoría con información minimizada. Son controles concretos, no una garantía absoluta ni una auditoría externa. El asistente sigue siendo de solo lectura; el proveedor externo requiere opt-in explícito y respeta límites de uso.</p>
                    </div>
                </details>
            </div>
        </section>

        <section class="border-t border-slate-200 py-14 sm:py-16" aria-labelledby="titulo-evolucion">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <p class="text-xs font-bold uppercase tracking-[0.14em] text-acento-700">Evolución del producto</p>
                <h2 id="titulo-evolucion" class="mt-3 text-3xl font-bold tracking-tight text-tinta-950">Del MVP a una beta más explicable y mantenible.</h2>
                <ol class="mt-8 grid gap-5 lg:grid-cols-3">
                    @foreach ($proyecto['evolucion'] as $hito)
                        <li class="rounded-2xl border border-slate-200 p-6">
                            <p class="text-xs font-bold uppercase tracking-wide text-acento-700">{{ $hito['periodo'] }}</p>
                            <h3 class="mt-3 text-xl font-bold text-tinta-950">{{ $hito['titulo'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-tinta-600">{{ $hito['descripcion'] }}</p>
                        </li>
                    @endforeach
                </ol>
                <p class="mt-6 max-w-3xl text-sm leading-6 text-tinta-600">Revisión del código y la documentación: {{ $proyecto['revision'] }}. Las capacidades descritas están implementadas e integradas según el historial disponible. Los despliegues y validaciones de staging se citan sólo cuando están documentados; no se consultó el estado remoto actual. La ampliación de la beta sigue en preparación: no implica nuevas admisiones ni un lanzamiento público.</p>
            </div>
        </section>

        <section class="border-t border-slate-200 bg-slate-50 py-14 sm:py-16" aria-labelledby="titulo-estado">
            <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
                <h2 id="titulo-estado" class="text-2xl font-bold tracking-tight text-tinta-950">Un producto propio en evolución.</h2>
                <p class="mt-4 max-w-3xl leading-7 text-tinta-600">Estado documentado: {{ $proyecto['estado'] }} La evolución se apoya en cambios acotados, pruebas y evidencia revalidada cuando cambia el producto.</p>
                <p class="mt-4 max-w-3xl leading-7 text-tinta-600">Si necesitás construir o evolucionar una aplicación con reglas de negocio propias, podemos conversar sobre tu proyecto.</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ route('inicio', [], false) }}#contacto" class="hero-accion inline-flex min-h-12 items-center rounded-lg bg-acento-700 px-5 font-semibold text-white hover:bg-acento-600">Contactar</a>
                    <a href="{{ route('inicio', [], false) }}#proyectos" class="inline-flex min-h-12 items-center rounded-lg border border-slate-300 bg-white px-5 font-semibold text-tinta-700 hover:bg-acento-50">Ver otros proyectos</a>
                    @if ($cvDisponible)
                        <a href="{{ asset($portafolio['cv']['archivo']) }}" download="{{ $portafolio['cv']['nombre_descarga'] }}" class="inline-flex min-h-12 items-center px-3 font-semibold text-acento-700 underline underline-offset-4">Descargar CV</a>
                    @endif
                </div>
            </div>
        </section>

        <dialog class="visor-foco" aria-labelledby="visor-foco-titulo" aria-describedby="visor-foco-ayuda" data-visor-foco>
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 p-4">
                <h2 id="visor-foco-titulo" class="font-bold text-tinta-950">Captura de Foco Finanzas</h2>
                <form method="dialog"><button autofocus class="min-h-11 rounded-lg border border-slate-300 px-4 text-sm font-semibold text-tinta-700">Cerrar imagen</button></form>
            </div>
            <div class="flex flex-wrap items-center gap-3 px-4 py-3">
                <button type="button" class="hero-accion min-h-11 rounded-lg border border-slate-300 px-4 text-sm font-semibold text-tinta-700 hover:bg-acento-50" aria-pressed="false" aria-controls="visor-foco-area" data-visor-original>Ver tamaño original</button>
                <p id="visor-foco-ayuda" class="text-sm text-tinta-600" aria-live="polite" data-visor-estado>Imagen ajustada al espacio disponible. Usá Escape para cerrar.</p>
            </div>
            <div id="visor-foco-area" class="visor-foco-area" tabindex="0" role="region" aria-label="Captura ampliada, desplazable">
                <img alt="" data-visor-imagen>
            </div>
        </dialog>
    </main>
    @include('portafolio.parciales.footer')
@endsection
