<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesSettingController;
use App\Http\Controllers\SitemapController;


Route::get('/', function(){
    return  redirect()->route('products.home');
});

Route::get('/compare/{device1}/{device2}',  [HomeController::class, 'compare'])->name('compare');
Route::get('/getdevice',  [PagesSettingController::class, 'getdevice'])->name('getdeveice');
Route::get('/compare-data', [PagesSettingController::class, 'compare_data'])->name('get.compare.data');


Route::get('/home', [HomeController::class, 'home'])->name('products.home');
Route::get('/mobiles-under-price-{price}', [HomeController::class, 'price'])->name('sort.price');
Route::get('/mobiles-of-{brand}-brand', [HomeController::class, 'brand'])->name('sort.brand');
Route::get('/search-products', [HomeController::class, 'search_products'])->name('search.products');

// contact page
Route::get('/contact', [HomeController::class, 'index_contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact.submit');

// about page
Route::get('/about', [HomeController::class, 'index_about'])->name('about');

Route::get('/compare-devices', function () {
    return view('user.comparison');
})->name('compare.devices');


Route::get('/post', function () {
    return view('user.singlepost');
});
Route::get('/auto', function () {
    return view('user.auto');
});


Route::get('/dashboard', function () {
    return view('adminpages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/navbar-settings', function () {
        return view('adminpages.pages-settings.navbar-settings');
    })->name('user.navbar');
   
  
    // home route
    Route::get('/home-settings', [PagesSettingController::class, 'home_setting'])->name('user.home');
    Route::post('/welcome', [PagesSettingController::class, 'welcome_store'])->name('welcome.store');

    // route to get model via ajax request
    Route::get('/modelss', [PagesSettingController::class, 'getByBrand'])->name('models.by.brand');
 
    // price and brand
    Route::post('/add-price-range', [PagesSettingController::class, 'add_price_range'])->name('add.price.range');
    Route::post('/add-new-brand', [PagesSettingController::class, 'add_new_brand'])->name('add.new.brand');
 
    // post route
    Route::get('/create-new-post', [PagesSettingController::class, 'create_post'])->name('create.post');
    Route::post('/store-post', [PagesSettingController::class, 'store_post'])->name('store.post');

    // Index Post
    Route::get('/index-post', [PagesSettingController::class, 'index_post'])->name('index.post');

    // Edit Post
    Route::get('/edit-post/{id}', [PagesSettingController::class, 'edit_post'])->name('edit.post');

    // Update Post
    Route::patch('/update-post/{id}', [PagesSettingController::class, 'update_post'])->name('update.post');

    // delete pro and con
    Route::delete('/delete/pro/{pro}', [PagesSettingController::class, 'delete_pro'])->name('delete.pro');
    Route::delete('/delete/con/{con}', [PagesSettingController::class, 'delete_con'])->name('delete.con');

    // Delete Post
    Route::delete('/delete-post/{id}', [PagesSettingController::class, 'delete_post'])->name('delete.post');

    // footer route
    Route::post('/store-footer', [PagesSettingController::class, 'store_footer'])->name('store.footer');
    Route::get('/footer', [PagesSettingController::class, 'user_footer'])->name('user.footer');


});

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');


require __DIR__.'/auth.php';

Route::get('/{slug}', [HomeController::class, 'show'])->name('products.show');
   
