<?php

use App\Slider;
use App\Freebie;
use App\TopProduct;
use App\Recommended;
use App\CategoryStock;
use App\PopularProduct;
use App\Boutique;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $hello_slider = Slider::where('name', 'Главный слайдер')->first();
    $special_slider = Slider::where('name', 'Специально для вас')->first();
    $recommended = Recommended::orderBy('order')->get();
    $category_stocks = CategoryStock::orderBy('order')->get();
    $category_stocks_first_line = $category_stocks->split(2)[0] ?? collect([]);
    $category_stocks_second_line = $category_stocks->split(2)[1] ?? collect([]);
    $top_products = TopProduct::orderBy('order')->get();
    $top_products_first_line = $top_products->split(2)[0] ?? collect([]);
    $top_products_second_line = $top_products->split(2)[1] ?? collect([]);
    $popular_products = PopularProduct::orderBy('order')->get();
    $freebies = Freebie::orderBy('order')->get();

    return view('hello', compact(
        'hello_slider',
        'special_slider',
        'recommended',
        'category_stocks',
        'category_stocks_first_line',
        'category_stocks_second_line',
        'top_products',
        'top_products_first_line',
        'top_products_second_line',
        'popular_products',
        'freebies'
    ));
});

Route::get('/boutique/{boutique}', function(Request $request, Boutique $boutique) {
    return view('boutique', compact('boutique'));
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
