// Requiere servidor local y Chromium/Playwright ya disponibles. No instala herramientas.
// PORTFOLIO_BASE_URL y PLAYWRIGHT_MODULE permiten usar instalaciones existentes.
const { test } = require('node:test');
const assert = require('node:assert/strict');
const { chromium } = require(process.env.PLAYWRIGHT_MODULE || 'playwright');
const base = process.env.PORTFOLIO_BASE_URL || 'http://127.0.0.1:8000';

test('la elección manual cambia colores reales del CSS compilado, incluso contra el sistema', async () => {
    const browser = await chromium.launch({ headless: true });
    try {
        for (const system of ['light', 'dark']) {
            const context = await browser.newContext({ colorScheme: system });
            const page = await context.newPage();
            for (const route of ['/', '/servicios', '/proyectos/foco-finanzas', '/proyectos/soluciones-comerciales']) {
                await page.goto(base + route);
                const colors = {};
                for (const theme of ['light', 'dark']) {
                    await page.locator('[data-apariencia] summary').click();
                    await page.locator(`.opcion-tema:has(input[value="${theme}"])`).click();
                    colors[theme] = await page.evaluate(() => {
                        const css = selector => getComputedStyle(document.querySelector(selector));
                        return {
                            body: css('body').backgroundColor,
                            heading: css('h1').color,
                            text: css('main p').color,
                            hero: css('.fondo-hero').backgroundImage,
                            header: css('body > header').backgroundColor,
                            card: css('main .superficie-tarjeta, main .superficie-captura').backgroundColor,
                            footer: css('body > footer').backgroundColor,
                        };
                    });
                    assert.equal(await page.locator('[data-apariencia]').getAttribute('open'), null);
                }
                assert.equal(colors.light.body, 'rgb(255, 255, 255)');
                assert.equal(colors.dark.body, 'rgb(11, 18, 32)');
                assert.equal(colors.light.heading, 'rgb(16, 24, 40)');
                assert.equal(colors.dark.heading, 'rgb(240, 245, 255)');
                for (const component of Object.keys(colors.light)) {
                    assert.notEqual(colors.light[component], colors.dark[component], `${system} / ${route}: ${component} no cambia`);
                }
                await page.reload();
                assert.equal(await page.locator('body').evaluate(e => getComputedStyle(e).backgroundColor), colors.dark.body);
            }
            await context.close();
        }
    } finally {
        await browser.close();
    }
});
