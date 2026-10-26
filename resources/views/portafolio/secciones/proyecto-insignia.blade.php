@php
    $proyecto = $portafolio['proyecto_insignia'];
    $escenasPrincipales = array_filter($proyecto['escenas'], fn (array $escena) => $escena['principal']);
    $escenasComplementarias = array_filter($proyecto['escenas'], fn (array $escena) => ! $escena['principal']);
    $portada = $proyecto['escenas'][0];
@endphp

<section id="foco-finanzas" class="scroll-mt-24 overflow-hidden bg-tinta-950 py-14 text-white sm:py-16" aria-labelledby="titulo-foco-finanzas" data-galeria-foco>
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="grid gap-8 md:grid-cols-[minmax(0,1.15fr)_minmax(0,0.85fr)] md:items-center lg:gap-16">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-blue-300">Proyecto insignia</p>
                <p class="mt-5 inline-flex rounded-full border border-blue-300/30 bg-blue-400/10 px-3 py-1 text-xs font-bold uppercase tracking-[0.12em] text-blue-200">
                    {{ $proyecto['contexto'] }}
                </p>
                <h2 id="titulo-foco-finanzas" class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl">{{ $proyecto['nombre'] }}</h2>
                <p class="mt-3 text-xl font-semibold text-blue-100">{{ $proyecto['subtitulo'] }}</p>
                <dl class="mt-6 space-y-4 text-sm leading-6">
                    <div>
                        <dt class="font-bold text-blue-200">El problema</dt>
                        <dd class="mt-1 text-slate-300">{{ $proyecto['resumen_problema'] }}</dd>
                    </div>
                    <div>
                        <dt class="font-bold text-blue-200">La solución</dt>
                        <dd class="mt-1 text-slate-300">{{ $proyecto['resumen_solucion'] }}</dd>
                    </div>
                    <div>
                        <dt class="font-bold text-blue-200">Mi participación</dt>
                        <dd class="mt-1 text-slate-300">Desarrollo individual: producto, backend, interfaz, pruebas y operación del entorno de staging.</dd>
                    </div>
                </dl>
                <p class="mt-5 text-sm leading-6 text-slate-400">{{ $proyecto['estado'] }}</p>
                <a href="#proyectos" class="mt-6 inline-flex min-h-11 items-center gap-2 rounded-md px-1 text-sm font-semibold text-blue-200 underline decoration-blue-300/40 underline-offset-4 transition-colors hover:text-white motion-reduce:transition-none">
                    Ver casos profesionales <span aria-hidden="true">↓</span>
                </a>
            </div>

            <figure class="mx-auto w-full max-w-sm rounded-2xl border border-white/10 bg-white/5 p-5 text-center sm:p-6">
                <div class="flex justify-center">
                    <img data-src="{{ asset('images/projects/foco/light/'.$portada['archivo']) }}" alt="{{ $portada['alt'] }}" width="390" height="844" loading="lazy" decoding="async" class="hidden max-h-[28rem] w-auto max-w-full rounded-xl" data-imagen-foco="light">
                    <img src="{{ asset('images/projects/foco/dark/'.$portada['archivo']) }}" alt="{{ $portada['alt'] }}" width="390" height="844" loading="lazy" decoding="async" class="max-h-[28rem] w-auto max-w-full rounded-xl" data-imagen-foco="dark">
                </div>
                <figcaption class="mt-4 text-sm leading-6 text-slate-300">{{ $portada['descripcion'] }}</figcaption>
                <p class="mt-2 text-xs leading-5 text-slate-400">Captura sintética · Sin datos de usuarios</p>
            </figure>
        </div>

        <details class="group mt-8 rounded-2xl border border-white/15 bg-white/5" data-detalle-foco>
            <summary class="cursor-pointer rounded-2xl px-5 py-5 font-bold text-blue-100 sm:px-6">Explorar capturas, decisiones y evidencia técnica</summary>
            <div class="border-t border-white/10 p-5 sm:p-8">
                <p class="mb-4 leading-7 text-slate-200">{{ $proyecto['descripcion'] }}</p>
                <p class="text-sm leading-6 text-slate-300">Las imágenes y cifras corresponden a evidencia fechada. Todos los datos visibles son sintéticos.</p>
                <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4" aria-label="Evidencia cuantitativa fechada">
                    @foreach ($proyecto['metricas'] as $metrica)
                        <article class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <p class="text-3xl font-bold tracking-tight text-white">{{ $metrica['valor'] }}</p>
                            <h3 class="mt-1 font-semibold text-blue-100">{{ $metrica['etiqueta'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-400">{{ $metrica['detalle'] }}</p>
                        </article>
                    @endforeach
                </div>

                <div class="mt-16 grid gap-8 lg:grid-cols-2">
                    <article class="rounded-2xl border border-white/10 bg-white/5 p-6 sm:p-8">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-blue-300">Problema</p>
                        <p class="mt-3 leading-7 text-slate-200">{{ $proyecto['problema'] }}</p>
                    </article>
                    <article class="rounded-2xl border border-white/10 bg-white/5 p-6 sm:p-8">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-blue-300">Solución</p>
                        <p class="mt-3 leading-7 text-slate-200">{{ $proyecto['solucion'] }}</p>
                    </article>
                </div>

                <div class="mt-16">
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                        <div class="max-w-2xl">
                            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-blue-300">Producto en contexto</p>
                            <h3 class="mt-3 text-3xl font-bold tracking-tight">Evidencia visual reproducible</h3>
                            <p class="mt-3 leading-7 text-slate-300">Escenas generadas localmente desde un dataset aislado, revisadas en ambos temas y sin información de la beta.</p>
                        </div>

                        <div class="inline-flex w-fit rounded-xl border border-white/15 bg-slate-900 p-1" role="group" aria-label="Tema de las capturas">
                            <button type="button" class="rounded-lg px-4 py-2 text-sm font-bold text-slate-300" aria-pressed="false" data-tema-foco="light">
                                Claro
                            </button>
                            <button type="button" class="rounded-lg bg-white px-4 py-2 text-sm font-bold text-tinta-950" aria-pressed="true" data-tema-foco="dark">
                                Oscuro
                            </button>
                        </div>
                    </div>

                    <div class="mt-8 grid gap-6 lg:grid-cols-2">
                        @foreach ($escenasPrincipales as $escena)
                            @php
                                $esDesktop = $escena['formato'] === 'desktop';
                                $ancho = $esDesktop ? 1440 : 390;
                                $alto = $esDesktop ? 900 : 844;
                            @endphp
                            <figure class="overflow-hidden rounded-2xl border border-white/10 bg-slate-900 {{ $esDesktop ? 'lg:col-span-2' : '' }}">
                                <div class="flex min-h-80 items-center justify-center bg-slate-800/70 p-4 sm:p-6">
                                    <img data-src="{{ asset('images/projects/foco/light/'.$escena['archivo']) }}" alt="{{ $escena['alt'] }}" width="{{ $ancho }}" height="{{ $alto }}" loading="lazy" decoding="async" class="hidden {{ $esDesktop ? 'w-full' : 'max-h-[34rem] w-auto' }} rounded-xl shadow-2xl" data-imagen-foco="light">
                                    <img src="{{ asset('images/projects/foco/dark/'.$escena['archivo']) }}" alt="{{ $escena['alt'] }}" width="{{ $ancho }}" height="{{ $alto }}" loading="lazy" decoding="async" class="{{ $esDesktop ? 'w-full' : 'max-h-[34rem] w-auto' }} rounded-xl shadow-2xl" data-imagen-foco="dark">
                                </div>
                                <figcaption class="p-5 sm:p-6">
                                    <p class="font-bold text-white">{{ $escena['nombre'] }}</p>
                                    <p class="mt-2 text-sm leading-6 text-slate-400">{{ $escena['descripcion'] }}</p>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>

                    <details class="mt-6 rounded-2xl border border-white/10 bg-white/5 group">
                        <summary class="cursor-pointer list-none px-6 py-5 font-bold text-blue-100 marker:content-none">
                            <span class="flex items-center justify-between gap-4">
                                Explorar movimientos, ciclos y asistente
                                <span class="text-xl text-blue-300 transition group-open:rotate-45" aria-hidden="true">+</span>
                            </span>
                        </summary>
                        <div class="grid gap-6 border-t border-white/10 p-6 lg:grid-cols-2">
                            @foreach ($escenasComplementarias as $escena)
                                @php
                                    $esDesktop = $escena['formato'] === 'desktop';
                                    $ancho = $esDesktop ? 1366 : 390;
                                    $alto = $esDesktop ? 768 : 844;
                                @endphp
                                <figure class="overflow-hidden rounded-xl bg-slate-900 {{ $esDesktop ? 'lg:col-span-2' : '' }}">
                                    <div class="flex items-center justify-center bg-slate-800/70 p-4">
                                        <img data-src="{{ asset('images/projects/foco/light/'.$escena['archivo']) }}" alt="{{ $escena['alt'] }}" width="{{ $ancho }}" height="{{ $alto }}" loading="lazy" decoding="async" class="hidden {{ $esDesktop ? 'w-full' : 'max-h-[32rem] w-auto' }} rounded-lg" data-imagen-foco="light">
                                        <img src="{{ asset('images/projects/foco/dark/'.$escena['archivo']) }}" alt="{{ $escena['alt'] }}" width="{{ $ancho }}" height="{{ $alto }}" loading="lazy" decoding="async" class="{{ $esDesktop ? 'w-full' : 'max-h-[32rem] w-auto' }} rounded-lg" data-imagen-foco="dark">
                                    </div>
                                    <figcaption class="p-5">
                                        <p class="font-bold text-white">{{ $escena['nombre'] }}</p>
                                        <p class="mt-2 text-sm leading-6 text-slate-400">{{ $escena['descripcion'] }}</p>
                                    </figcaption>
                                </figure>
                            @endforeach
                        </div>
                    </details>
                </div>

                <div class="mt-16 grid gap-8 lg:grid-cols-[minmax(0,1fr)_minmax(18rem,0.55fr)]">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.16em] text-blue-300">Decisiones técnicas</p>
                        <div class="mt-6 grid gap-4 sm:grid-cols-2">
                            @foreach ($proyecto['decisiones'] as $decision)
                                <article class="rounded-2xl border border-white/10 bg-white/5 p-6">
                                    <h3 class="font-bold text-white">{{ $decision['titulo'] }}</h3>
                                    <p class="mt-3 text-sm leading-6 text-slate-300">{{ $decision['descripcion'] }}</p>
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <aside class="rounded-2xl border border-blue-300/20 bg-blue-400/10 p-6 sm:p-8" aria-labelledby="responsabilidades-foco">
                        <h3 id="responsabilidades-foco" class="text-lg font-bold text-white">Responsabilidad individual</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-200">{{ $proyecto['responsabilidades'] }}</p>
                        <ul class="mt-6 flex flex-wrap gap-2" aria-label="Stack de Foco Finanzas">
                            @foreach ($proyecto['stack'] as $tecnologia)
                                <li class="rounded-full border border-blue-300/20 bg-slate-950/40 px-3 py-1 text-xs font-semibold text-blue-100">{{ $tecnologia }}</li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </details>
    </div>
</section>
