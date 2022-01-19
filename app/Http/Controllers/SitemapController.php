<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function generate()
    {
        SitemapGenerator::create(config('app.url'))->hasCrawled(function (Url $url) {
            if ($url->segment(1) === 'forgot-password') {
                return;
            }
            if ($url->segment(1) === 'login') {
                return;
            }

            return $url;
        })->writeToFile(public_path('sitemap.xml'));
    }
}
