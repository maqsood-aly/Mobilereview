<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    public function index()
    {
        // Get all products
        $products = Product::all();

        // Generate URLs for products
        $urls = [];
        foreach ($products as $product) {
            $urls[] = [
                'loc' => route('products.show', ['slug' => $product->slug]),
                'changefreq' => 'daily',
                'priority' => '0.8',
            ];
        }

        // Add homepage URL
        $urls[] = [
            'loc' => route('products.home'),
            'changefreq' => 'daily',
            'priority' => '1.0', // Assuming homepage has highest priority
        ];

        return response()->view('sitemap.sitemap', ['urls' => $urls])->header('Content-Type','text/xml');
    }
}
