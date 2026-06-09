<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Statik sayfalar
        $urls = [
            ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => '/kategoriler', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => '/iletisim', 'priority' => '0.5', 'changefreq' => 'monthly'],
        ];

        foreach ($urls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . config('app.url') . $url['loc'] . '</loc>' . "\n";
            $xml .= '    <lastmod>' . Carbon::now()->toAtomString() . '</lastmod>' . "\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        // Kategoriler
        foreach ($categories as $category) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . config('app.url') . '/kategoriler/' . $category->slug . '</loc>' . "\n";
            $xml .= '    <lastmod>' . $category->updated_at->toAtomString() . '</lastmod>' . "\n";
            $xml .= '    <changefreq>weekly</changefreq>' . "\n";
            $xml .= '    <priority>0.8</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
