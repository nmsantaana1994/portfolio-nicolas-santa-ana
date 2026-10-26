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

            if (enlace.origin !== window.location.origin || enlace.pathname !== window.location.pathname) {
                return;
            }

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

        galeria.querySelectorAll('[data-ampliar-foco]').forEach((enlace) => {
            enlace.href = enlace.querySelector(`img[data-imagen-foco="${temaActivo}"]`).src;
        });
    };

    botones.forEach((boton) => {
        boton.addEventListener('click', () => activarTema(boton.dataset.temaFoco));
    });

    const visor = galeria.querySelector('[data-visor-foco]');

    if (!visor || typeof visor.showModal !== 'function') {
        return;
    }

    let origen;
    let overflowAnterior;

    galeria.querySelectorAll('[data-ampliar-foco]').forEach((enlace) => {
        enlace.addEventListener('click', (evento) => {
            if (evento.ctrlKey || evento.metaKey || evento.shiftKey || evento.altKey) {
                return;
            }

            evento.preventDefault();
            const imagen = enlace.querySelector('img:not(.hidden)');
            const ampliada = visor.querySelector('[data-visor-imagen]');

            ampliada.src = imagen.src;
            ampliada.alt = imagen.alt;
            ampliada.width = Number(imagen.getAttribute('width'));
            ampliada.height = Number(imagen.getAttribute('height'));
            visor.querySelector('#visor-foco-titulo').textContent = enlace.dataset.nombre;
            origen = enlace;
            overflowAnterior = document.documentElement.style.overflow;
            visor.showModal();
            document.documentElement.style.overflow = 'hidden';
        });
    });

    visor.addEventListener('close', () => {
        document.documentElement.style.overflow = overflowAnterior;
        origen?.focus({ preventScroll: true });
    });

    visor.addEventListener('click', (evento) => {
        if (evento.target === visor) {
            const rect = visor.getBoundingClientRect();

            if (evento.clientX < rect.left || evento.clientX > rect.right || evento.clientY < rect.top || evento.clientY > rect.bottom) {
                visor.close();
            }
        }
    });
});
