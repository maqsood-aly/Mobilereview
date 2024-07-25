<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Brand;
use App\Models\Pricelist;
use App\Models\Footer;
use App\Models\Welcome;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('include.user.navbar', function ($view) {
            $brands = Brand::get('name');
            $prices = Pricelist::get('price');
            $view->with(compact('brands','prices'));
        });

        View::composer('include.user.footer', function ($view) {
            $footer = Footer::pluck('data')->first(); 
            $view->with(compact('footer'));
        });

        View::composer('user.home', function ($view) {
            $welcome = Welcome::pluck('welcome_section')->first(); 
            $view->with(compact('welcome'));
        });
    }
}
