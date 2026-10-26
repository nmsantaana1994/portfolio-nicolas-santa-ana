<figure class="mx-auto w-full max-w-md" data-demo-cateringonline>
    <div class="ops-mockup ops-pedidos">
        <div class="border-b border-slate-200 bg-acento-50 px-5 py-5">
            <p class="text-sm font-bold tracking-tight text-acento-700">CateringOnline</p><p class="mt-3 text-2xl font-bold tracking-tight text-tinta-950">Tu semana, elegida.</p><p class="mt-2 text-xs text-tinta-600">Semana Demo · Turno Demo</p>
        </div>
        <div class="p-4 sm:p-5">
            <ol class="grid grid-cols-5 gap-1.5" aria-label="Días ficticios del pedido semanal">
                @foreach (['Lun', 'Mar', 'Mié', 'Jue', 'Vie'] as $dia)
                    <li @class(['flex min-h-12 min-w-0 flex-col items-center justify-center gap-1 rounded-xl border py-2 text-xs font-semibold', 'border-acento-700 bg-acento-700 text-white' => in_array($dia, ['Lun', 'Mié']), 'border-slate-200 bg-white text-tinta-600' => ! in_array($dia, ['Lun', 'Mié'])])>{{ $dia }}<span aria-hidden="true">@if (in_array($dia, ['Lun', 'Mié'])) @include('proyectos.partials.icono-plataformas', ['tipo' => 'check']) @else <span class="block size-5"></span> @endif</span></li>
                @endforeach
            </ol>
            <div class="mt-5 space-y-3">
                @foreach (['Lunes' => 'Nube', 'Miércoles' => 'Brisa'] as $dia => $menu)
                    <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white p-3"><div class="w-16 shrink-0">@include('proyectos.partials.plato-demo')</div><div class="min-w-0"><p class="text-xs font-semibold text-acento-700">{{ $dia }} Demo</p><p class="mt-1 text-sm font-bold text-tinta-950">Menú {{ $menu }} Demo</p><p class="mt-1 text-xs text-tinta-600">Selección ilustrativa</p></div></div>
                @endforeach
            </div>
            <div class="mt-5 flex items-center justify-between gap-3 rounded-xl bg-acento-50 p-4"><div><p class="text-sm font-bold text-tinta-950">Resumen Demo</p><p class="mt-1 text-xs text-tinta-600">Comidas seleccionadas para la semana</p></div><span class="text-acento-700">@include('proyectos.partials.icono-plataformas', ['tipo' => 'calendario'])</span></div>
        </div>
    </div>
    <figcaption class="mt-4 text-center text-xs leading-6 text-tinta-600">Pedido ficticio. Menús, días y turno son ejemplos; la demostración no permite hacer pedidos.</figcaption>
</figure>
