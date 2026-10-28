<section id="inicio" class="fondo-hero scroll-mt-24 border-b border-slate-100">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-12 sm:px-8 sm:py-16 md:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)] md:gap-8 lg:gap-10 lg:px-10 lg:py-16 xl:gap-16 xl:py-24">
        <div>
            <p class="text-base font-bold text-tinta-950">{{ $portafolio['persona']['nombre'] }}</p>
            <p class="mt-1 text-sm font-semibold text-acento-700">{{ $portafolio['persona']['titulo'] }}</p>
            <h1 class="mt-7 max-w-3xl text-balance text-4xl font-bold leading-[1.1] tracking-[-0.04em] text-tinta-950 sm:text-5xl xl:text-6xl">
                {{ __('home.title') }}
                <span class="text-acento-700">{{ __('home.emphasis') }}</span>
            </h1>
            <p class="mt-6 max-w-2xl text-pretty text-base leading-7 text-tinta-600 lg:text-lg lg:leading-8">
                {{ __('home.intro') }}
            </p>

            <div class="mt-8 flex flex-wrap gap-3" aria-label="{{ __('ui_common.acciones_principales') }}">
                <a href="#foco-finanzas" class="hero-accion inline-flex min-h-12 flex-1 items-center justify-center gap-2 rounded-lg bg-acento-700 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-tinta-950 sm:flex-none">
                    {{ __('ui_common.ver_proyectos') }} @include('portafolio.parciales.indicador-enlace', ['direccion' => 'abajo'])
                </a>
                <a href="#contacto" class="hero-accion inline-flex min-h-12 flex-1 items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-tinta-950 hover:border-acento-700 hover:bg-acento-50 sm:flex-none">
                    {{ __('ui_common.contactar') }}
                </a>
            </div>
            <a href="{{ $cvDisponible ? asset($portafolio['cv']['archivo']) : '#cv' }}" @if ($cvDisponible) download="{{ $portafolio['cv']['nombre_descarga'] }}" @endif class="hero-accion mt-2 inline-flex min-h-11 items-center gap-2 rounded-md text-sm font-semibold text-tinta-600 underline decoration-slate-300 underline-offset-4 hover:text-acento-700 hover:decoration-acento-700">
                {{ $cvDisponible ? __('ui_common.descargar_cv') : __('ui_common.consultar_disponibilidad_del_cv') }}
                <svg aria-hidden="true" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m-4-4 4 4 4-4M5 16v4h14v-4" />
                </svg>
            </a>
            <p class="mt-5 flex items-start gap-2 text-xs leading-5 text-tinta-600">
                <span class="mt-1.5 size-2 shrink-0 rounded-full bg-acento-600" aria-hidden="true"></span>
                {{ $portafolio['hero']['disponibilidad'] }}
            </p>
        </div>

        <aside class="hidden rounded-2xl border border-slate-200 bg-white/90 p-6 shadow-xl shadow-slate-900/5 md:block lg:p-8" aria-label="{{ __('ui_common.perfil_tecnico_resumido') }}">
            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-acento-700">{{ __('ui_common.del_negocio_al_software') }}</p>
            <p class="mt-3 text-xl font-bold leading-7 tracking-tight text-tinta-950 lg:text-2xl">{{ __('ui_home.sistemas_que_acompanan_la_operacion_diaria') }}</p>
            <dl class="mt-6 space-y-5">
                <div>
                    <dt class="text-sm font-medium text-tinta-400">{{ __('ui_common.especialidad') }}</dt>
                    <dd class="mt-1 font-semibold text-tinta-950">{{ __('ui_home.aplicaciones_de_gestion_e_integracion_de_sistemas_con') }}</dd>
                </div>
                <div class="border-t border-slate-100 pt-5">
                    <dt class="text-sm font-medium text-tinta-400">{{ __('ui_common.tecnologias_principales') }}</dt>
                    <dd class="mt-1 font-semibold text-tinta-950">PHP · JavaScript · MySQL · Blade</dd>
                </div>
                <div class="border-t border-slate-100 pt-5">
                    <dt class="text-sm font-medium text-tinta-400">{{ __('ui_common.ubicacion') }}</dt>
                    <dd class="mt-1 font-semibold text-tinta-950">{{ $portafolio['persona']['ubicacion'] }}</dd>
                </div>
            </dl>
        </aside>
    </div>
</section>
