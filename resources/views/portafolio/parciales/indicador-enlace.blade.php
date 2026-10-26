<svg aria-hidden="true" focusable="false" class="inline-block size-4 shrink-0 align-middle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">
    @if (($direccion ?? 'derecha') === 'izquierda')
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m6-6-6 6 6 6" />
    @elseif (($direccion ?? 'derecha') === 'abajo')
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-6-6 6 6 6-6" />
    @else
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
    @endif
</svg>
