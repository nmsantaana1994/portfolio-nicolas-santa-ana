// The explicit URL always wins. Storage is never used to redirect or choose content.
export function rememberLanguage(storage, locale) {
    if (!['es', 'en'].includes(locale)) return;
    try { storage()?.setItem('portfolio-language', locale); } catch { /* URLs work without storage. */ }
}

export function equivalentUrl(href, current) {
    const target = new URL(href, current);
    target.hash = new URL(current).hash;
    return target.href;
}

export function initializeLanguage(document, window, closeNavigation = () => {}) {
    const selector = document.querySelector('[data-language-selector]');
    if (!selector) return;
    const links = [...selector.querySelectorAll('[data-language]')];
    const updateAnchors = () => links.forEach(link => {
        link.href = equivalentUrl(link.href, window.location.href);
    });
    updateAnchors();
    window.addEventListener('hashchange', updateAnchors);
    selector.addEventListener('click', event => {
        const link = event.target.closest('[data-language]');
        if (link) {
            updateAnchors();
            rememberLanguage(() => window.localStorage, link.dataset.language);
            close(true);
        }
    });
    const close = (focus = false) => {
        selector.open = false;
        if (focus) selector.querySelector('summary').focus();
    };
    selector.addEventListener('toggle', () => {
        if (!selector.open) return;
        updateAnchors();
        document.querySelector('[data-apariencia]')?.removeAttribute('open');
        closeNavigation();
    });
    document.addEventListener('click', event => {
        if (!selector.contains(event.target)) close();
    });
    document.addEventListener('keydown', event => {
        if (event.key === 'Escape' && selector.open) {
            event.preventDefault();
            close(true);
        }
    });
    selector.addEventListener('focusout', event => {
        if (event.relatedTarget && !selector.contains(event.relatedTarget)) close();
    });
}
