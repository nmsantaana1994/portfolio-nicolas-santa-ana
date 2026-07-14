const botonMenu = document.querySelector('[data-menu-boton]');
const menuMovil = document.querySelector('[data-menu-movil]');

if (botonMenu && menuMovil) {
    const cerrarMenu = () => {
        menuMovil.classList.add('hidden');
        botonMenu.setAttribute('aria-expanded', 'false');
    };

    botonMenu.addEventListener('click', () => {
        const estaAbierto = botonMenu.getAttribute('aria-expanded') === 'true';

        menuMovil.classList.toggle('hidden', estaAbierto);
        botonMenu.setAttribute('aria-expanded', String(!estaAbierto));
    });

    menuMovil.querySelectorAll('a').forEach((enlace) => {
        enlace.addEventListener('click', cerrarMenu);
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            cerrarMenu();
        }
    });
}
