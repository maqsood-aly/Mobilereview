<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Import DB facade
use App\Models\Feature;
use Illuminate\Support\Facades\Log;
use App\Models\Models;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_feature;
use App\Models\Brand;
use Illuminate\Support\Facades\Cache;
use App\Models\Welcome;

class HomeController extends Controller
{
    public function home()
    {
        // Perform your queries directly
        $products = Product::published()->take(12)->get(['name', 'price', 'image_url', 'slug']);
        $latestProducts = Product::published()->latest()->take(10)->get(['name', 'price', 'image_url', 'slug']);

        // Render the view and pass the data
        return view('user.home', compact('products', 'latestProducts'));
    }

    public function show($slug)
    {
        // Fetch product with its features, brand, and model
        $products = Product::where('slug', $slug)
            ->with(['brand', 'model', 'features', 'pros', 'cons'])
            ->firstOrFail();

        // Fetch related products with the same base model
        $relatedProducts = Product::whereHas('model', function ($query) use ($products) {
            $query->where('base_model', $products->model->base_model);
        })->where('id', '!=', $products->id)->take(12)->get();


        // Fetch features for the product
        $features = Product_feature::with('feature')
            ->where('product_id', $products->id)
            ->get();

        // Fetch latest products
        $latestProducts = Product::latest()->take(12)->get();
        $product_url = true;
        return view('user.singlepost', compact('products', 'features', 'relatedProducts', 'latestProducts', 'product_url'));
    }

    function price($price)
    {
        $products = Product::where('price', '<=', $price)
            ->where('price', '>', $price - 10000)
            ->take(12)->get(['name', 'price', 'image_url', 'slug']);
        $latestProducts = Product::latest()->take(12)->get();
        $card_title = 'Mobiles Under Price ' . number_format($price) . ' Pkr';
        $price_filter = true;
        return view('user.home', compact('products', 'latestProducts', 'card_title', 'price_filter'));
    }

    function brand($brand)
    {
        $brand = Brand::where('name', $brand)->firstOrFail();
        $products = Product::where('brand_id', $brand->id)->take(12)->get(['name', 'price', 'image_url', 'slug']);
        $latestProducts = Product::latest()->take(12)->get();
        $card_title = 'Mobiles of ' . '"' . $brand->name . '"' . ' brand';
        $brand_filter = true;
        return view('user.home', compact('products', 'latestProducts', 'card_title', 'brand_filter'));
    }



    public function compare($device1, $device2)
    {
        $product1 = Product::where('slug', $device1)
            ->with(['brand', 'model', 'features', 'pros', 'cons'])
            ->firstOrFail();

        $product2 = Product::where('slug', $device2)
            ->with(['brand', 'model', 'features', 'pros', 'cons'])
            ->firstOrFail();

        return view('user.comparison', compact('product1', 'product2'));
    }
    public function search_products(Request $request)
    {
        $products = Product::where('status', 'published')
        ->where('name', 'like', '%' . $request->query('query') . '%')
        ->get(['name', 'slug']);

        return response()->json([
            'products' => $products
        ]);
    }

    public function index_contact()
    {
        return view('user.contact');
    }
    public function index_about()
    {
        return view('user.about');
    }
}
