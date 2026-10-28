import { initializeLanguage } from './language.js';

const botonMenu = document.querySelector('[data-menu-boton]');
const menuMovil = document.querySelector('[data-menu-movil]');
const apariencia = document.querySelector('[data-apariencia]');

const cerrarApariencia = (devolverFoco = false) => {
    if (!apariencia?.open) return;
    apariencia.open = false;
    if (devolverFoco) apariencia.querySelector('summary').focus();
};

const actualizarEstadoMenu = (estaAbierto) => {
    if (!menuMovil || !botonMenu) return;
    menuMovil.classList.toggle('hidden', !estaAbierto);
    if (estaAbierto) cerrarApariencia();
    botonMenu.setAttribute('aria-expanded', String(estaAbierto));
    botonMenu.setAttribute('aria-label', estaAbierto ? 'Cerrar navegación' : 'Abrir navegación');
};

initializeLanguage(document, window, () => actualizarEstadoMenu(false));

if (apariencia) {
    apariencia.addEventListener('change', () => cerrarApariencia(true));
    apariencia.addEventListener('toggle', () => {
        if (!apariencia.open) return;
        actualizarEstadoMenu(false);
        apariencia.querySelector('input:checked')?.focus();
    });
    document.addEventListener('click', (event) => {
        if (!apariencia.contains(event.target)) cerrarApariencia();
        else if (event.target.matches('[data-selector-tema]')) cerrarApariencia(true);
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && apariencia.open) {
            event.preventDefault();
            cerrarApariencia(true);
        }
    });
    apariencia.addEventListener('focusout', (event) => {
        if (event.relatedTarget && !apariencia.contains(event.relatedTarget)) cerrarApariencia();
    });
}

if (botonMenu && menuMovil) {
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
    const botonOriginal = visor.querySelector('[data-visor-original]');
    const area = visor.querySelector('#visor-foco-area');
    const ajustarImagen = (original = false) => {
        visor.toggleAttribute('data-original', original);
        botonOriginal.setAttribute('aria-pressed', String(original));
        botonOriginal.textContent = original ? 'Ajustar imagen' : 'Ver tamaño original';
        visor.querySelector('[data-visor-estado]').textContent = original
            ? 'Tamaño original. Desplazá el área para explorar los detalles; usá Escape para cerrar.'
            : 'Imagen ajustada al espacio disponible. Usá Escape para cerrar.';
        area.scrollTop = 0;
        area.scrollLeft = 0;
    };

    botonOriginal.addEventListener('click', () => ajustarImagen(!visor.hasAttribute('data-original')));

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
            ajustarImagen();
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
