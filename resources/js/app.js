const botonMenu = document.querySelector('[data-menu-boton]');
const menuMovil = document.querySelector('[data-menu-movil]');

if (botonMenu && menuMovil) {
    const actualizarEstadoMenu = (estaAbierto) => {
        menuMovil.classList.toggle('hidden', !estaAbierto);
        botonMenu.setAttribute('aria-expanded', String(estaAbierto));
        botonMenu.setAttribute('aria-label', estaAbierto ? 'Cerrar navegación' : 'Abrir navegación');
    };

    const cerrarMenu = (devolverFoco = false) => {
        actualizarEstadoMenu(false);

        if (devolverFoco) {
            botonMenu.focus();
        }
    };

    botonMenu.addEventListener('click', () => {
        const estaAbierto = botonMenu.getAttribute('aria-expanded') === 'true';

        actualizarEstadoMenu(!estaAbierto);
    });

    menuMovil.querySelectorAll('a').forEach((enlace) => {
        enlace.addEventListener('click', (evento) => {
            cerrarMenu();

            const destino = document.getElementById(enlace.hash.slice(1));
            const encabezado = destino?.querySelector('h2');

            if (encabezado) {
                evento.preventDefault();
                window.history.pushState(null, '', enlace.hash);
                destino.scrollIntoView({ block: 'start' });
                encabezado.setAttribute('tabindex', '-1');
                encabezado.focus({ preventScroll: true });
            }
        });
    });

    document.addEventListener('keydown', (evento) => {
        if (evento.key === 'Escape' && botonMenu.getAttribute('aria-expanded') === 'true') {
            cerrarMenu(true);
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            cerrarMenu();
        }
    });
}

document.querySelectorAll('[data-galeria-foco]').forEach((galeria) => {
    const botones = galeria.querySelectorAll('[data-tema-foco]');
    const imagenes = galeria.querySelectorAll('[data-imagen-foco]');

    const activarTema = (temaActivo) => {
        botones.forEach((boton) => {
            const estaActivo = boton.dataset.temaFoco === temaActivo;

            boton.setAttribute('aria-pressed', String(estaActivo));
            boton.classList.toggle('bg-white', estaActivo);
            boton.classList.toggle('text-tinta-950', estaActivo);
            boton.classList.toggle('text-slate-300', !estaActivo);
        });

        imagenes.forEach((imagen) => {
            if (imagen.dataset.imagenFoco === temaActivo && !imagen.getAttribute('src') && imagen.dataset.src) {
                imagen.setAttribute('src', imagen.dataset.src);
            }

            imagen.classList.toggle('hidden', imagen.dataset.imagenFoco !== temaActivo);
        });
    };

    botones.forEach((boton) => {
        boton.addEventListener('click', () => activarTema(boton.dataset.temaFoco));
    });
});
