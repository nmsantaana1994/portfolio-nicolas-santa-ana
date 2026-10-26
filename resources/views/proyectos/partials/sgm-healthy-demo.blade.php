<figure class="sgmh-escena mx-auto mt-10 max-w-6xl" aria-labelledby="sgmh-demo-caption" data-sgm-healthy-demo>
    <div class="sgmh-composicion">
        <div class="sgmh-plan" data-demo-sgm>
            <div class="flex items-center justify-between gap-3 border-b border-slate-200 px-4 py-4 sm:px-6">
                <span class="text-sm font-bold tracking-tight text-acento-700">SGM <span class="ml-2 font-medium text-tinta-600">Planificación</span></span>
                <span class="rounded-full bg-acento-50 px-3 py-1 text-xs font-semibold text-acento-700">Semana Demo</span>
            </div>
            <div class="p-4 sm:p-6">
                <div class="flex flex-wrap items-end justify-between gap-2 text-left">
                    <div><p class="text-xs font-semibold uppercase tracking-wide text-tinta-600">Operación Prisma Demo</p><p class="mt-1 text-xl font-bold tracking-tight text-tinta-950 sm:text-2xl">Una semana, organizada.</p></div>
                    <span class="text-xs font-semibold text-acento-700">Propuesta de ejemplo</span>
                </div>
                <ol class="mt-5 grid grid-cols-5 gap-1.5 sm:gap-2" aria-label="Semana ficticia de planificación">
                    @foreach (['Lun' => 'Aura', 'Mar' => 'Prisma', 'Mié' => 'Brisa', 'Jue' => 'Lumen', 'Vie' => 'Nube'] as $dia => $menu)
                        <li @class(['min-w-0 rounded-xl border px-1 py-3 text-center', 'border-acento-700 bg-acento-50' => $dia === 'Mié', 'border-slate-200 bg-slate-50' => $dia !== 'Mié'])>
                            <span class="block text-xs font-semibold text-tinta-600">{{ $dia }}</span>
                            <span class="mt-2 block text-xs font-bold text-tinta-950">{{ $menu }}</span>
                        </li>
                    @endforeach
                </ol>
                <div class="mt-5 grid items-center gap-3 border-t border-slate-200 pt-5 text-left sm:grid-cols-[8rem_1fr]">
                    <div class="sgmh-plato-plan">@include('proyectos.partials.plato-demo')</div>
                    <div>
                        <p class="text-xs font-semibold text-acento-700">Miércoles Demo</p>
                        <p class="mt-1 text-lg font-bold text-tinta-950">Menú Brisa Demo</p>
                        <p class="mt-2 text-sm leading-6 text-tinta-600">Receta ilustrativa para la planificación de la semana.</p>
                        <p class="mt-3 text-xs font-semibold text-tinta-700">Cantidad ficticia: 24 porciones</p>
                    </div>
                </div>
            </div>
            <p class="border-t border-slate-200 px-4 py-3 text-left text-xs text-tinta-600 sm:px-6">Menú general <span aria-hidden="true">·</span> Adaptación por operación <span aria-hidden="true">·</span> Revisión</p>
        </div>
        <span class="sgmh-vinculo text-acento-700" aria-hidden="true">@include('portafolio.parciales.indicador-enlace')</span>
        <div class="sgmh-movil" data-demo-healthy>
            <div class="sgmh-movil-pantalla">
                <div class="sgmh-auricular" aria-hidden="true"></div>
                <div class="px-5 pb-5 pt-4 text-left">
                    <p class="text-sm font-bold tracking-tight text-acento-700">Healthy</p>
                    <p class="mt-4 text-xs font-semibold text-tinta-600">Hola, Persona Demo</p>
                    <p class="mt-1 text-xl font-bold tracking-tight text-tinta-950">Tu menú de hoy</p>
                    <div class="mx-auto mt-4 w-36">@include('proyectos.partials.plato-demo')</div>
                    <p class="mt-3 text-lg font-bold text-tinta-950">Menú Brisa Demo</p>
                    <p class="mt-1 text-xs leading-5 text-tinta-600">Miércoles Demo · Receta disponible</p>
                    <div class="mt-5 rounded-xl border border-slate-200 bg-white p-3">
                        <p class="text-xs font-bold text-tinta-950">Mi registro personal</p>
                        <p class="mt-1 text-xs leading-5 text-tinta-600">Almuerzo Demo · Ejemplo ilustrativo</p>
                    </div>
                    <p class="mt-4 flex justify-between border-t border-slate-200 pt-3 text-xs font-semibold text-tinta-600"><span>Menús</span><span>Recetas</span><span>Perfil</span></p>
                </div>
            </div>
        </div>
    </div>
    <figcaption id="sgmh-demo-caption" class="mx-auto mt-6 max-w-3xl text-center text-xs leading-6 text-tinta-600">Recreaciones conceptuales, no pantallas internas. Personas, operación, menús, recetas y cantidades son ficticios. La flecha representa una relación de información, no un mecanismo de sincronización.</figcaption>
</figure>
