<svg aria-hidden="true" focusable="false" class="size-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
    @switch($tipo)
        @case('light')
            <circle cx="12" cy="12" r="4" /><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.5 1.5m11 11L19 19M5 19l1.5-1.5m11-11L19 5" />
            @break
        @case('dark')
            <path d="M20.5 13A8.5 8.5 0 0 1 11 3.5 8.5 8.5 0 1 0 20.5 13Z" />
            @break
        @case('check')
            <path d="m5 12 4 4L19 6" />
            @break
        @default
            <rect x="3" y="4" width="18" height="12" rx="2" /><path d="M8 21h8m-4-5v5" />
    @endswitch
</svg>
