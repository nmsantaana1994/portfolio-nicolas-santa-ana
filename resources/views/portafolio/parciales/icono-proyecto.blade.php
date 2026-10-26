<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
    @switch($icono)
        @case('sistemas')
            <rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 9h18M8 21h8M12 18v3M8 13h3M15 13h1"/>
            @break
        @case('terminal')
            <rect x="4" y="3" width="16" height="18" rx="3"/><path d="M8 8h8M8 12h4M9 17l2 2 4-4"/>
            @break
        @case('menu')
            <rect x="3" y="4" width="18" height="17" rx="2"/><path d="M7 2v4M17 2v4M3 10h18M7 14h3M14 14h3M7 17h3"/>
            @break
        @case('integracion')
            <rect x="2" y="8" width="7" height="8" rx="2"/><rect x="15" y="8" width="7" height="8" rx="2"/><path d="M9 10h6M9 14h6M5 8V5h14v3M5 16v3h14v-3"/>
            @break
    @endswitch
</svg>
