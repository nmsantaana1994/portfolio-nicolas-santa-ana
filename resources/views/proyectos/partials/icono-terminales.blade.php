<svg aria-hidden="true" focusable="false" class="size-6 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
    @switch($tipo)
        @case('identidad')
            <circle cx="12" cy="8" r="3" /><path d="M6 20v-2a6 6 0 0 1 12 0v2M3 7V4h3m12 0h3v3M3 17v3h3m12 0h3v-3" />
            @break
        @case('reglas')
            <path d="m12 3 8 3v6c0 5-8 9-8 9s-8-4-8-9V6l8-3Z" /><path d="m8 12 3 3 5-6" />
            @break
        @case('registro')
            <rect x="5" y="3" width="14" height="18" rx="3" /><path d="M9 7h6m-6 5 2 2 4-4m-6 7h6" />
            @break
        @case('local')
            <ellipse cx="12" cy="5" rx="8" ry="3" /><path d="M4 5v14c0 4 16 4 16 0V5M4 12c0 4 16 4 16 0" />
            @break
        @default
            <path d="M20 8a8 8 0 0 0-14-3L3 8m0-5v5h5M4 16a8 8 0 0 0 14 3l3-3m0 5v-5h-5" />
    @endswitch
</svg>
