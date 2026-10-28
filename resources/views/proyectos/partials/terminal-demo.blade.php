<figure class="terminal-presentacion mx-auto w-full max-w-md" aria-labelledby="terminal-demo-caption" data-terminal-demo>
    <div class="terminal-dispositivo">
        <div class="terminal-pantalla">
            <div class="flex items-center justify-between gap-3 border-b border-slate-200 px-5 py-4">
                <span class="text-sm font-bold tracking-tight text-tinta-950">Terminal</span>
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-acento-700">@include('proyectos.partials.icono-terminales', ['tipo' => 'local']) Local</span>
            </div>
            <div class="px-5 py-7 text-center sm:px-7">
                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-tinta-600">Registro de consumo</p>
                <div class="mx-auto mt-6 flex size-20 items-center justify-center rounded-full border border-blue-100 bg-acento-50 text-acento-700" aria-hidden="true">
                    <svg aria-hidden="true" focusable="false" class="size-10" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="20" cy="14" r="6" /><path d="M8 34v-2a12 12 0 0 1 24 0v2M3 12V4h8m18 0h8v8M3 28v8h8m18 0h8v-8" /></svg>
                </div>
                <p class="mt-4 text-2xl font-bold tracking-tight text-tinta-950">Persona identificada</p>
                <p class="mt-1 text-sm text-tinta-600">Identificación recibida</p>
                <div class="mt-6 flex items-center gap-3 rounded-2xl border border-slate-200 bg-white p-4 text-left">
                    <span class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-acento-50 text-acento-700">@include('proyectos.partials.icono-terminales', ['tipo' => 'registro'])</span>
                    <div><p class="text-sm font-bold text-tinta-950">Almuerzo</p><p class="mt-1 text-xs text-tinta-600">Consumo registrado</p></div>
                    <svg aria-hidden="true" class="ml-auto size-5 shrink-0 text-acento-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6" /></svg>
                </div>
                <p class="mt-5 flex items-center justify-center gap-2 text-xs font-medium text-tinta-600">@include('proyectos.partials.icono-terminales', ['tipo' => 'sincronizacion']) Pendiente de sincronizar</p>
            </div>
            <p class="border-t border-slate-200 px-5 py-3 text-center text-xs font-medium text-tinta-600">Registro local</p>
        </div>
    </div>
    <figcaption id="terminal-demo-caption" class="mt-6 text-center text-xs leading-5 text-tinta-600">Recreación ficticia con datos de ejemplo; no es una pantalla interna.</figcaption>
</figure>
