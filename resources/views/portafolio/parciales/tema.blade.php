<script>
    (() => {
        const key = 'portfolio-theme';
        const root = document.documentElement;
        const system = window.matchMedia('(prefers-color-scheme: dark)');
        const valid = value => ['light', 'dark'].includes(value) ? value : 'system';
        const read = () => {
            try { return valid(localStorage.getItem(key)); } catch { return 'system'; }
        };
        let preference = read();

        const apply = () => {
            const theme = preference === 'system' ? (system.matches ? 'dark' : 'light') : preference;
            root.dataset.theme = theme;
            root.dataset.themePreference = preference;
            root.style.colorScheme = theme;
            document.querySelectorAll('meta[name="theme-color"]').forEach(meta => {
                meta.content = theme === 'dark' ? '#0b1220' : '#ffffff';
            });
            document.querySelectorAll('[data-selector-tema]').forEach(input => {
                input.checked = input.value === preference;
                input.disabled = false;
            });
            document.querySelectorAll('[data-icono-tema]').forEach(icon => {
                icon.classList.toggle('hidden', icon.dataset.iconoTema !== preference);
            });
            document.querySelectorAll('[data-apariencia-boton]').forEach(button => {
                button.setAttribute('aria-label', 'Apariencia del portfolio: ' + ({ system: 'Sistema', light: 'Claro', dark: 'Oscuro' })[preference]);
            });
        };

        apply();
        document.addEventListener('DOMContentLoaded', apply, { once: true });
        document.addEventListener('change', event => {
            if (!event.target.matches('[data-selector-tema]')) return;
            preference = valid(event.target.value);
            try {
                if (preference === 'system') localStorage.removeItem(key);
                else localStorage.setItem(key, preference);
            } catch { /* Sin almacenamiento, la selección sigue vigente en esta página. */ }
            apply();
        });
        system.addEventListener('change', () => {
            if (preference === 'system') apply();
        });
        window.addEventListener('storage', event => {
            if (event.key === key || event.key === null) {
                preference = read();
                apply();
            }
        });
    })();
</script>
