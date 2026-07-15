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
        enlace.addEventListener('click', () => cerrarMenu());
    });

    document.addEventListener('keydown', (evento) => {
        if (evento.key === 'Escape' && botonMenu.getAttribute('aria-expanded') === 'true') {
            cerrarMenu(true);
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            cerrarMenu();
        }
    });
}
