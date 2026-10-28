<?php

namespace Tests\Feature;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class TranslationConsistencyTest extends TestCase
{
    public function test_catalogues_are_complete_nonempty_and_literal_references_exist(): void
    {
        $catalogues = [];
        foreach (['es', 'en'] as $locale) {
            $catalogues[$locale] = [];
            foreach (File::files(lang_path($locale)) as $file) {
                $catalogues[$locale] += Arr::dot([$file->getFilenameWithoutExtension() => require $file->getPathname()]);
            }
            ksort($catalogues[$locale]);
            foreach ($catalogues[$locale] as $key => $text) {
                $this->assertIsString($text, $locale.': '.$key);
                $this->assertNotSame('', trim($text), $locale.': '.$key);
            }
        }
        $this->assertSame(array_keys($catalogues['es']), array_keys($catalogues['en']));
        foreach ([app_path(), resource_path('views')] as $directory) {
            foreach (File::allFiles($directory) as $file) {
                preg_match_all('/__\(\s*[\'"]([a-zA-Z0-9_.-]+)[\'"]/', $file->getContents(), $matches);
                foreach ($matches[1] as $key) {
                    $this->assertArrayHasKey($key, $catalogues['es'], $file->getRelativePathname());
                    $this->assertArrayHasKey($key, $catalogues['en'], $file->getRelativePathname());
                }
            }
        }
    }

    public function test_spanish_sources_match_the_last_english_review(): void
    {
        $review = json_decode(File::get(lang_path('review.json')), true, flags: JSON_THROW_ON_ERROR);
        $files = [];
        foreach (File::files(lang_path('es')) as $file) {
            // Hash content, not line endings: Windows and Linux must agree.
            $files[$file->getFilename()] = hash('sha256', json_encode(require $file->getPathname(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR));
        }
        ksort($files);
        $this->assertSame($review['es_sha256'], $files, 'Spanish source changed: review English and update lang/review.json. Hashes do not prove semantic equivalence.');
    }
}
