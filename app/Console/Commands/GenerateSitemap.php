<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post; // Adjust based on your model

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the XML sitemap for the website';

    public function handle()
    {
        // Start sitemap generation
        SitemapGenerator::create(config('app.url'))
            ->hasCrawled(function (Url $url) {
                // Add URLs to sitemap dynamically
                $this->info("Adding URL to sitemap: {$url->url}");
            })
            ->writeToFile(public_path('sitemap.xml'));

        // Add dynamic price URLs
        $this->addDynamicPriceUrls();

        $this->info('Sitemap generated successfully.');
    }

    private function addDynamicPriceUrls()
    {
        // Example: Generate dynamic price URLs
        for ($price = 1000; $price <= 5000; $price += 1000) {
            $url = url("/mobiles-under-price-{$price}");

            // Create Url object for the dynamic URL
            $urlObject = Url::create($url)
                ->setPriority(0.8) // Set priority if needed
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY); // Set change frequency if needed

            // Add the Url object to the sitemap using hasCrawled callback
            SitemapGenerator::create(config('app.url'))
                ->hasCrawled(function (Url $url) use ($urlObject) {
                    return $urlObject;
                })
                ->writeToFile(public_path('sitemap.xml'));

            $this->info("Adding dynamic price URL to sitemap: {$url}");
        }
    }
}
