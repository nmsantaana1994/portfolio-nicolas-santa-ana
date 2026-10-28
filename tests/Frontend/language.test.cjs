const {test}=require('node:test');
const assert=require('node:assert/strict');
test('language preference is explicit, persistent and storage-safe',async()=>{
    const {rememberLanguage}=await import('../../resources/js/language.js');
    const values={};const storage={setItem:(k,v)=>values[k]=v};
    rememberLanguage(()=>storage,'en');assert.equal(values['portfolio-language'],'en');
    rememberLanguage(()=>storage,'es');assert.equal(values['portfolio-language'],'es');
    rememberLanguage(()=>storage,'fr');assert.equal(values['portfolio-language'],'es');
    assert.doesNotThrow(()=>rememberLanguage(()=>{throw Error('blocked')},'en'));
});
test('equivalent page URLs preserve hashes without replacing slugs',async()=>{
    const {equivalentUrl}=await import('../../resources/js/language.js');
    assert.equal(equivalentUrl('/en/proyectos/terminales','https://example.com/proyectos/terminales#estado'),'https://example.com/en/proyectos/terminales#estado');
    assert.equal(equivalentUrl('/proyectos/terminales','https://example.com/en/proyectos/terminales#estado'),'https://example.com/proyectos/terminales#estado');
    assert.equal(equivalentUrl('/en','https://example.com/#proyectos'),'https://example.com/en#proyectos');
});
