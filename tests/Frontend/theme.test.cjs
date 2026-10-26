const { test } = require('node:test');
const assert = require('node:assert/strict');
const { readFileSync } = require('node:fs');
const { runInNewContext } = require('node:vm');
const source = readFileSync(`${__dirname}/../../resources/views/portafolio/parciales/tema.blade.php`, 'utf8')
    .replace('<script>', '').replace('</script>', '');

function boot({ saved = null, dark = false, blocked = false } = {}) {
    const events = {};
    const root = { dataset: {}, style: {} };
    const inputs = ['system', 'light', 'dark'].map(value => ({ value, checked: value === 'system', disabled: true, matches: selector => selector === '[data-selector-tema]' }));
    const metas = [{}, {}];
    const system = { matches: dark, addEventListener: (_, callback) => { events.system = callback; } };
    let stored = saved;
    const storage = {
        getItem: () => { if (blocked) throw new Error('blocked'); return stored; },
        setItem: (_, value) => { if (blocked) throw new Error('blocked'); stored = value; },
        removeItem: () => { if (blocked) throw new Error('blocked'); stored = null; },
    };
    const context = {
        window: { matchMedia: () => system, addEventListener: (type, callback) => { events[type] = callback; } },
        document: {
            documentElement: root,
            querySelectorAll: selector => selector.startsWith('meta') ? metas : selector === '[data-selector-tema]' ? inputs : [],
            addEventListener: (type, callback) => { events[type] = callback; },
        },
        localStorage: storage,
    };
    runInNewContext(source, context);
    return {
        root, metas,
        select: { get value() { return inputs.find(input => input.checked).value; } },
        stored: () => stored,
        choose: value => { events.change({ target: inputs.find(input => input.value === value) }); },
        system: dark => { system.matches = dark; events.system(); },
        storage: value => { stored = value; events.storage({ key: 'portfolio-theme' }); },
    };
}

test('sin preferencia sigue al sistema y aplica el tema antes del DOM completo', () => {
    for (const dark of [false, true]) {
        const page = boot({ dark });
        assert.equal(page.root.dataset.theme, dark ? 'dark' : 'light');
        assert.equal(page.root.dataset.themePreference, 'system');
        assert.equal(page.root.style.colorScheme, dark ? 'dark' : 'light');
        assert.equal(page.metas[0].content, dark ? '#0b1220' : '#ffffff');
    }
});

test('la preferencia manual prevalece y persiste para la próxima visita', () => {
    const page = boot({ dark: true });
    page.choose('light');
    assert.equal(page.stored(), 'light');
    page.system(true);
    assert.equal(page.root.dataset.theme, 'light');
    assert.equal(boot({ saved: page.stored(), dark: true }).root.dataset.theme, 'light');
});

test('Sistema elimina la preferencia y vuelve a seguir los cambios del dispositivo', () => {
    const page = boot({ saved: 'dark' });
    page.choose('system');
    assert.equal(page.stored(), null);
    assert.equal(page.root.dataset.theme, 'light');
    page.system(true);
    assert.equal(page.root.dataset.theme, 'dark');
    assert.equal(page.select.value, 'system');
});

test('un valor inválido no se interpreta como un tema manual', () => {
    assert.equal(boot({ saved: 'invalid', dark: true }).root.dataset.theme, 'dark');
});

test('sin acceso al almacenamiento funcionan sistema y selección en memoria', () => {
    const page = boot({ blocked: true, dark: true });
    page.choose('light');
    assert.equal(page.root.dataset.theme, 'light');
    page.choose('system');
    assert.equal(page.root.dataset.theme, 'dark');
});

test('sincroniza preferencias entre pestañas', () => {
    const page = boot();
    page.storage('dark');
    assert.equal(page.root.dataset.theme, 'dark');
    page.storage(null);
    assert.equal(page.root.dataset.themePreference, 'system');
});
