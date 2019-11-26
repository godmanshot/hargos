<?php

use App\Slider;
use App\Freebie;
use App\Boutique;
use App\Category;
use App\Interview;
use App\TopProduct;
use App\Recommended;
use App\TradingHouse;
use App\CategoryStock;
use App\PopularProduct;
use Illuminate\Http\Request;

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
    $interviews = Interview::orderBy('order')->get();

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
        'freebies',
        'interviews'
    ));
});

Route::get('/boutique/{boutique}', function(Request $request, Boutique $boutique) {
    return view('boutique', compact('boutique'));
})->name('boutique');

Route::get('/about', function(Request $request) {
    return view('about');
});

Route::get('/trading-houses', function(Request $request) {
    $trading_houses = TradingHouse::orderBy('order')->with('boutiques.categories')->get();

    if($request->has('trading_house')) {
        $selected_trading_house = TradingHouse::where('id', $request->trading_house)->first();
        $categories = $selected_trading_house->boutiquesCategories;
    } else {
        $selected_trading_house = false;
        $categories = Category::all();
    }

    if($request->has('category')) {
        $selected_category = Category::where('id', $request->category)->first();
        $boutiques = $selected_category->boutiques;
    } else {
        $selected_category = false;
        $boutiques = Boutique::all();
    }

    return view('trading-houses', compact('trading_houses', 'selected_trading_house', 'categories', 'selected_category', 'boutiques'));
})->name('trading-houses');

Route::get('/tour-operators', function(Request $request) {
    return view('tour-operators');
});

Route::get('/advice', function(Request $request) {
    return view('advice');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
