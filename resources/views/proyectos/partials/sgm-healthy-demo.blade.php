<figure class="sgmh-escena mx-auto mt-10 max-w-6xl" aria-labelledby="sgmh-demo-caption" data-sgm-healthy-demo>
    <div class="sgmh-composicion">
        <div class="sgmh-plan" data-demo-sgm>
            <div class="flex items-center justify-between gap-3 border-b border-slate-200 px-4 py-4 sm:px-6">
                <span class="text-sm font-bold tracking-tight text-acento-700">SGM <span class="ml-2 font-medium text-tinta-600">{{ __('ui_common.planificacion') }}</span></span>
                <span class="rounded-full bg-acento-50 px-3 py-1 text-xs font-semibold text-acento-700">{{ __('ui_common.esta_semana') }}</span>
            </div>
            <div class="p-4 sm:p-6">
                <div class="flex flex-wrap items-end justify-between gap-2 text-left">
                    <div><p class="text-xs font-semibold uppercase tracking-wide text-tinta-600">{{ __('ui_common.operacion_prisma') }}</p><p class="mt-1 text-xl font-bold tracking-tight text-tinta-950 sm:text-2xl">{{ __('ui_common.una_semana_organizada') }}</p></div>
                    <span class="text-xs font-semibold text-acento-700">{{ __('ui_common.en_revision') }}</span>
                </div>
                <ol class="mt-5 grid grid-cols-5 gap-1.5 sm:gap-2" aria-label="{{ __('ui_common.semana_ficticia_de_planificacion') }}">
                    @foreach (['Lun' => 'Aura', 'Mar' => 'Prisma', 'Mié' => 'Brisa', 'Jue' => 'Lumen', 'Vie' => 'Nube'] as $dia => $menu)
                        <li @class(['min-w-0 rounded-xl border px-1 py-3 text-center', 'border-acento-700 bg-acento-50' => $dia === 'Mié', 'border-slate-200 bg-slate-50' => $dia !== 'Mié'])>
                            <span class="block text-xs font-semibold text-tinta-600">{{ \App\Support\PortfolioContent::label($dia) }}</span>
                            <span class="mt-2 block text-xs font-bold text-tinta-950">{{ $menu }}</span>
                        </li>
                    @endforeach
                </ol>
                <div class="mt-5 grid items-center gap-3 border-t border-slate-200 pt-5 text-left sm:grid-cols-[8rem_1fr]">
                    <div class="sgmh-plato-plan">@include('proyectos.partials.plato-demo')</div>
                    <div>
                        <p class="text-xs font-semibold text-acento-700">{{ __('ui_common.miercoles') }}</p>
                        <p class="mt-1 text-lg font-bold text-tinta-950">{{ __('ui_common.menu_brisa') }}</p>
                        <p class="mt-2 text-sm leading-6 text-tinta-600">{{ __('ui_mockups.receta_para_la_planificacion_de_la_semana') }}</p>
                        <p class="mt-3 text-xs font-semibold text-tinta-700">{{ __('ui_common.24_porciones') }}</p>
                    </div>
                </div>
            </div>
            <p class="border-t border-slate-200 px-4 py-3 text-left text-xs text-tinta-600 sm:px-6">{{ __('ui_common.menu_general') }} <span aria-hidden="true">·</span> {{ __('ui_common.adaptacion_por_operacion') }} <span aria-hidden="true">·</span> {{ __('ui_common.revision') }}</p>
        </div>
        <span class="sgmh-vinculo text-acento-700" aria-hidden="true">@include('portafolio.parciales.indicador-enlace')</span>
        <div class="sgmh-movil" data-demo-healthy>
            <div class="sgmh-movil-pantalla">
                <div class="sgmh-auricular" aria-hidden="true"></div>
                <div class="px-5 pb-5 pt-4 text-left">
                    <p class="text-sm font-bold tracking-tight text-acento-700">Healthy</p>
                    <p class="mt-4 text-xs font-semibold text-tinta-600">{{ __('ui_common.mi_espacio') }}</p>
                    <p class="mt-1 text-xl font-bold tracking-tight text-tinta-950">{{ __('ui_common.tu_menu_de_hoy') }}</p>
                    <div class="mx-auto mt-4 w-36">@include('proyectos.partials.plato-demo')</div>
                    <p class="mt-3 text-lg font-bold text-tinta-950">{{ __('ui_common.menu_brisa') }}</p>
                    <p class="mt-1 text-xs leading-5 text-tinta-600">{{ __('ui_common.miercoles_receta_disponible') }}</p>
                    <div class="mt-5 rounded-xl border border-slate-200 bg-white p-3">
                        <p class="text-xs font-bold text-tinta-950">{{ __('ui_common.mi_registro_personal') }}</p>
                        <p class="mt-1 text-xs leading-5 text-tinta-600">{{ __('ui_common.almuerzo_registrado') }}</p>
                    </div>
                    <p class="mt-4 flex justify-between border-t border-slate-200 pt-3 text-xs font-semibold text-tinta-600"><span>{{ __('ui_common.menus') }}</span><span>{{ __('ui_common.recetas') }}</span><span>{{ __('ui_common.perfil') }}</span></p>
                </div>
            </div>
        </div>
    </div>
    <figcaption id="sgmh-demo-caption" class="mx-auto mt-6 max-w-3xl text-center text-xs leading-6 text-tinta-600">{{ __('ui_mockups.recreaciones_ficticias_de_sgm_y_healthy_no_pantallas') }}</figcaption>
</figure>
