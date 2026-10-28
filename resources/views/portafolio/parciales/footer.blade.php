    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-8 text-sm text-tinta-600 sm:px-8 md:flex-row md:items-center md:justify-between lg:px-10">
            <p>&copy; {{ now()->year }} {{ $portafolio['persona']['nombre'] }}.</p>
            <p>{{ __('ui_home.desarrollado_con_laravel_blade_y_tailwind_css') }}</p>
        </div>
    </footer>
