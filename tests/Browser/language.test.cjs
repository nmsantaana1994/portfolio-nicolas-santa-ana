// Reuses an existing local server and Playwright installation; never installs tools.
const {test}=require('node:test');
const assert=require('node:assert/strict');
const {chromium}=require(process.env.PLAYWRIGHT_MODULE||'playwright');
const fs=require('node:fs'),path=require('node:path');
const base=process.env.PORTFOLIO_BASE_URL||'http://127.0.0.1:8000';

test('ES/EN sample, navigation, storage and visual infrastructure',async()=>{
    const browser=await chromium.launch({headless:true});
    const report=[];
    try {
        for(const width of [390,768,1280]) {
            const context=await browser.newContext({viewport:{width,height:900},reducedMotion:'reduce'});
            const page=await context.newPage(),errors=[];
            page.on('pageerror',e=>errors.push(e.message));
            page.on('response',r=>{if(r.status()>=400)errors.push(r.status()+':'+r.url())});
            await page.goto(base);
            await page.evaluate(()=>localStorage.setItem('portfolio-language','en'));
            await page.reload();
            assert.equal(await page.locator('html').getAttribute('lang'),'es');
            for(const locale of ['es','en']) {
                await page.goto(base+(locale==='en'?'/en':''));
                await page.evaluate(()=>document.fonts.ready);
                assert.match(await page.locator('h1').innerText(),locale==='en'?/I build software/:/Desarrollo software/);
                const colors=[];
                for(const theme of ['light','dark']) {
                    await page.locator('[data-apariencia] summary').click();
                    await page.locator(`.opcion-tema:has(input[value="${theme}"])`).click();
                    const metrics=await page.evaluate(()=>({overflow:document.documentElement.scrollWidth>innerWidth,background:getComputedStyle(document.body).backgroundColor,heading:getComputedStyle(document.querySelector('h1')).color}));
                    assert.equal(metrics.overflow,false);colors.push(metrics);
                    const summary=page.locator('[data-language-selector] summary');
                    await page.keyboard.press('Tab');await summary.focus();await page.keyboard.press('Enter');
                    assert.equal(await page.locator('[data-language-selector]').getAttribute('open'),'');
                    assert.notEqual(await summary.evaluate(e=>getComputedStyle(e).outlineStyle),'none');
                    if(process.env.PORTFOLIO_REVIEW_DIR){fs.mkdirSync(process.env.PORTFOLIO_REVIEW_DIR,{recursive:true});await page.screenshot({path:path.join(process.env.PORTFOLIO_REVIEW_DIR,`home-${locale}-${theme}-${width}.png`)})}
                    await page.keyboard.press('Escape');
                    assert(await summary.evaluate(e=>e===document.activeElement));
                    assert.equal(await page.locator('[data-language-selector]').getAttribute('open'),null);
                    await summary.click();await page.locator('h1').click();
                    assert.equal(await page.locator('[data-language-selector]').getAttribute('open'),null);
                    report.push({locale,width,theme,...metrics});
                }
                assert.notEqual(colors[0].background,colors[1].background);
                assert.notEqual(colors[0].heading,colors[1].heading);
                if(width<1024) {
                    await page.locator('[data-menu-boton]').click();
                    await page.locator('[data-language-selector] summary').click();
                    await page.waitForFunction(() => document.querySelector('[data-menu-boton]').getAttribute('aria-expanded') === 'false');
                    assert.equal(await page.locator('[data-menu-boton]').getAttribute('aria-expanded'),'false');
                    assert.equal(await page.locator('[data-language-selector]').getAttribute('open'),'');
                    await page.keyboard.press('Escape');
                    await page.locator('[data-menu-boton]').click();await page.keyboard.press('Escape');
                    assert(await page.locator('[data-menu-boton]').evaluate(e=>e===document.activeElement));
                }
            }
            await page.goto(base+'/proyectos/terminales#estado');
            await page.locator('[data-language-selector] summary').click();
            await page.locator('[data-language="en"]').click();
            await page.waitForURL('**/en/proyectos/terminales#estado');
            assert.equal(await page.evaluate(()=>localStorage.getItem('portfolio-language')),'en');
            await page.reload();assert.equal(await page.locator('html').getAttribute('lang'),'en');
            await page.goto(base+'/en');
            // pushState does not fire hashchange: selector must still copy the latest anchor.
            await page.evaluate(()=>history.pushState(null,'','#proyectos'));
            await page.locator('[data-language-selector] summary').click();
            await page.locator('[data-language="es"]').click();
            await page.waitForURL(url=>url.pathname==='/'&&url.hash==='#proyectos');
            assert.equal(await page.evaluate(()=>localStorage.getItem('portfolio-language')),'es');
            assert.deepEqual(errors,[]);
            await context.close();
        }
        const blocked=await browser.newContext();
        await blocked.addInitScript(()=>Object.defineProperty(window,'localStorage',{get(){throw Error('blocked')}}));
        const p=await blocked.newPage(),errors=[];p.on('pageerror',e=>errors.push(e.message));
        await p.goto(base+'/en');await p.locator('[data-language-selector] summary').click();await p.locator('[data-language="es"]').click();
        await p.waitForURL(url=>url.pathname==='/');assert.deepEqual(errors,[]);await blocked.close();
        const nojs=await browser.newContext({javaScriptEnabled:false});const q=await nojs.newPage();
        await q.goto(base);assert(await q.locator('[data-language-selector] summary').isVisible());
        await q.locator('[data-language-selector] summary').click();await q.locator('[data-language="en"]').click();
        assert.equal(new URL(q.url()).pathname,'/en');await nojs.close();
        if(process.env.PORTFOLIO_REVIEW_DIR)fs.writeFileSync(path.join(process.env.PORTFOLIO_REVIEW_DIR,'report.json'),JSON.stringify(report,null,2));
    } finally {await browser.close()}
});
