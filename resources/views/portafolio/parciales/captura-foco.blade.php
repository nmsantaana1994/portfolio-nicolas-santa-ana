<figure class="superficie-captura min-w-0 rounded-2xl border border-slate-200 bg-slate-50 p-4 sm:p-5">
    <a href="{{ asset('images/projects/foco/dark/'.$escena['archivo']) }}" target="_blank" rel="noopener" class="group flex justify-center rounded-xl bg-tinta-950 p-3" aria-label="{{ __('ui_common.ampliar_name', ['name' => \App\Support\PortfolioContent::label($escena['nombre'])]) }}" data-ampliar-foco data-nombre="{{ \App\Support\PortfolioContent::label($escena['nombre']) }}">
        <img data-src="{{ asset('images/projects/foco/light/'.$escena['archivo']) }}" alt="{{ $escena['alt'] }}" width="{{ $escena['ancho'] }}" height="{{ $escena['alto'] }}" loading="lazy" decoding="async" class="hidden h-auto max-h-[30rem] w-auto max-w-full rounded-lg" data-imagen-foco="light">
        <img src="{{ asset('images/projects/foco/dark/'.$escena['archivo']) }}" alt="{{ $escena['alt'] }}" width="{{ $escena['ancho'] }}" height="{{ $escena['alto'] }}" loading="{{ ($prioritaria ?? false) ? 'eager' : 'lazy' }}" decoding="async" class="h-auto max-h-[30rem] w-auto max-w-full rounded-lg" data-imagen-foco="dark">
    </a>
    <figcaption class="mt-4 text-sm leading-6 text-tinta-600">
        <span class="block font-bold text-tinta-950">{{ \App\Support\PortfolioContent::label($escena['nombre']) }}</span>
        {{ $escena['descripcion'] }}
        <span class="mt-2 block text-xs font-semibold text-acento-700">{{ __('ui_common.selecciona_la_imagen_para_ampliar') }} @include('portafolio.parciales.indicador-enlace')</span>
    </figcaption>
</figure>
