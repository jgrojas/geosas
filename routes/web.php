<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{locale}', function (string $locale) {
    if (in_array($locale, ['es', 'en'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('locale.switch');

Route::get('/', fn () => view('home'))->name('home');

Route::get('/sitemap.xml', function () {
    $url = rtrim(config('app.url'), '/');
    $lastmod = now()->toAtomString();
    $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{$url}/</loc>
    <lastmod>{$lastmod}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
</urlset>
XML;

    return response($xml, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');
