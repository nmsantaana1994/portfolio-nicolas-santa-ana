<figure class="mx-auto w-full max-w-xl" data-demo-zonalapp>
    <div class="ops-mockup">
        <div class="flex items-center justify-between gap-3 border-b border-slate-200 px-4 py-4 sm:px-5">
            <span class="text-sm font-bold tracking-tight text-acento-700">ZonalApp</span><span class="rounded-full bg-acento-50 px-3 py-1 text-xs font-semibold text-acento-700">{{ __('ui_common.operacion_prisma') }}</span>
        </div>
        <div class="grid grid-cols-[2.5rem_minmax(0,1fr)] sm:grid-cols-[3rem_minmax(0,1fr)]">
            <div class="flex flex-col items-center gap-6 border-r border-slate-200 bg-slate-50 py-6 text-acento-700" aria-hidden="true">
                @include('proyectos.partials.icono-plataformas', ['tipo' => 'panel'])
                @include('proyectos.partials.icono-plataformas', ['tipo' => 'calendario'])
                @include('proyectos.partials.icono-plataformas', ['tipo' => 'personas'])
            </div>
            <div class="min-w-0 p-4 sm:p-5">
                <p class="text-xs font-semibold uppercase tracking-wide text-tinta-600">{{ __('ui_common.mi_operacion') }}</p><p class="mt-2 text-xl font-bold tracking-tight text-tinta-950">{{ __('ui_common.tu_panel_operativo') }}</p>
                <div class="mt-5 grid grid-cols-2 gap-2 sm:gap-3">
                    @foreach (['Cantidades' => 'panel', 'Recepción' => 'calendario', 'Reclamos' => 'reclamos', 'Personal' => 'personas'] as $modulo => $icono)
                        <div class="min-w-0 rounded-xl border border-slate-200 bg-slate-50 p-3"><span class="text-acento-700">@include('proyectos.partials.icono-plataformas', ['tipo' => $icono])</span><p class="mt-3 text-xs font-bold text-tinta-950 sm:text-sm">{{ \App\Support\PortfolioContent::label($modulo) }}</p><p class="mt-1 text-xs text-tinta-600">{{ __('ui_common.acceso_por_perfil') }}</p></div>
                    @endforeach
                </div>
                <div class="mt-5 space-y-3 border-t border-slate-200 pt-4 text-xs">
                    <p class="font-bold text-tinta-950">{{ __('ui_common.seguimiento') }}</p>
                    <div class="flex flex-wrap justify-between gap-2"><span class="text-tinta-600">{{ __('ui_common.revision_semanal') }}</span><span class="font-semibold text-acento-700">{{ __('ui_common.por_revisar') }}</span></div>
                    <div class="flex flex-wrap justify-between gap-2"><span class="text-tinta-600">{{ __('ui_common.pedido_de_insumos') }}</span><span class="font-semibold text-tinta-700">{{ __('ui_common.recepcion_pendiente') }}</span></div>
                </div>
            </div>
        </div>
    </div>
    <figcaption class="mt-4 text-center text-xs leading-6 text-tinta-600">{{ __('ui_mockups.dashboard_ficticio_con_datos_de_ejemplo_no_es') }}</figcaption>
</figure>
