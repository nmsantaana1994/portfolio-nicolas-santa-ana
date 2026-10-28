<?php

namespace Tests\Feature;

use App\Support\PortfolioLocale;
use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class LocaleTest extends TestCase
{
    public function test_partial_language_selector_is_local_only_without_disabling_english_routes(): void
    {
        foreach (['production', 'staging', 'local', 'testing'] as $environment) {
            config(['app.env' => $environment]);
            foreach (['/', '/en', '/en/proyectos/terminales'] as $url) {
                $response = $this->get($url)->assertOk();
                if (in_array($environment, ['local', 'testing'], true)) {
                    $response->assertSee('data-language-selector', false);
                } else {
                    $response->assertDontSee('data-language-selector', false);
                }
                if (str_starts_with($url, '/en')) {
                    $response->assertHeader('X-Robots-Tag', 'noindex, follow')
                        ->assertSee('<meta name="robots" content="noindex, follow">', false);
                }
            }
        }
    }

    public function test_all_pages_keep_their_locale_links_canonical_and_partial_seo(): void
    {
        config(['app.url' => 'https://portfolio.example.com']);
        foreach (['es', 'en'] as $locale) {
            foreach (PortfolioLocale::PAGES as $name => [$path]) {
                $url = ($locale === 'en' ? '/en' : '').($path === '/' ? '' : $path);
                $response = $this->get($url ?: '/')->assertOk()->assertHeader('Content-Language', $locale);
                $dom = new DOMDocument;
                @$dom->loadHTML($response->getContent());
                $x = new DOMXPath($dom);
                $this->assertSame($locale, $x->evaluate('string(/html/@lang)'));
                $this->assertSame(1, $x->query('//link[@rel="canonical"]')->length);
                $this->assertSame('https://portfolio.example.com'.$url, $x->evaluate('string(//link[@rel="canonical"]/@href)'));
                $this->assertSame($locale === 'en' ? 'noindex, follow' : 'index, follow', $x->evaluate('string(//meta[@name="robots"]/@content)'));
                $this->assertSame($locale === 'en' ? 'en_US' : 'es_AR', $x->evaluate('string(//meta[@property="og:locale"]/@content)'));
                $this->assertSame(0, $x->query('//link[@hreflang="en"]')->length);
                foreach (['es', 'x-default'] as $alternate) {
                    $this->assertSame('https://portfolio.example.com'.($path === '/' ? '' : $path), $x->evaluate('string(//link[@hreflang="'.$alternate.'"]/@href)'));
                }
                foreach (['es', 'en'] as $target) {
                    $this->assertSame(($target === 'en' ? '/en' : '').($path === '/' ? ($target === 'en' ? '' : '/') : $path), $x->evaluate('string(//a[@data-language="'.$target.'"]/@href)'));
                }
                foreach ($x->query('//a[@href][not(@data-language)]') as $a) {
                    $href = $a->getAttribute('href');
                    if (str_starts_with($href, '#') || str_starts_with($href, 'mailto:')) {
                        continue;
                    }
                    $host = parse_url($href, PHP_URL_HOST);
                    if ($host && ! in_array($host, ['portfolio.example.com', 'localhost'], true)) {
                        continue;
                    }
                    $targetPath = parse_url($href, PHP_URL_PATH);
                    if (str_starts_with($targetPath, '/cv/') || str_starts_with($targetPath, '/images/')) {
                        continue;
                    }
                    $this->assertSame($locale === 'en', str_starts_with($targetPath, '/en'), $name.': '.$href);
                }
            }
        }
    }

    public function test_url_wins_over_preference_and_the_sample_is_translated(): void
    {
        $this->withCookie('portfolio-language', 'en')->get('/')->assertOk()
            ->assertSee('Desarrollo software para')->assertDontSee('I build software to');
        $this->withCookie('portfolio-language', 'es')->get('/en')->assertOk()
            ->assertSee('I build software to')->assertSee('solve real problems.')
            ->assertSee('Projects')->assertSee('Services')->assertSee('Only selected content')
            ->assertSee('system integration and software maintenance.')
            ->assertHeader('X-Robots-Tag', 'noindex, follow');
        $this->get('/fr')->assertNotFound();
        $this->get('/en/en')->assertNotFound();
    }
}
