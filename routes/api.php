<?php

use App\City;
use App\Country;
use App\Boutique;
use App\Category;
use App\TourHouse;
use App\TradingHouse;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('cors')->get('/trading-house', function(Request $request) {
    $models = TradingHouse::orderBy('order')->get();

    return $models;
});

Route::middleware('cors')->get('/trading-house/{trading_house}/categories', function(Request $request, TradingHouse $trading_house) {
    $categories = collect();

    $trading_house->boutiques->map(function($item) use ($categories) {
        foreach($item->categories as $category) {
            $categories->push($category);
        }
    });

    return $categories;
});

Route::middleware('cors')->get('/trading-house/{trading_house}/boutiques-by-category/{category}', function(Request $request, TradingHouse $trading_house, Category $category) {
    $models = Boutique::whereHas('categories', function ($query) use ($category) {
        $query->where('categories.id', '=', $category->id);
    })->whereHas('tradingHouses', function ($query) use ($trading_house) {
        $query->where('trading_houses.id', '=', $trading_house->id);
    })->get();

    return $models;
});

Route::middleware('cors')->get('/boutiques', function(Request $request) {

    $models = Boutique::latest();

    if($request->has('category')) {
        $category = $request->category;
        $models->whereHas('categories', function ($query) use ($category) {
            $query->where('categories.id', '=', $category);
        });
    }

    if($request->has('trading_house')) {
        $trading_house = $request->trading_house;
        $models->whereHas('tradingHouses', function ($query) use ($trading_house) {
            $query->where('trading_houses.id', '=', $trading_house);
        });
    }

    if($request->has('sort')) {
        $models->orderBy($request->sort);
    }

    return $models->get();
});

Route::middleware('cors')->get('/tour-operators', function(Request $request) {

    $models = TourHouse::orderBy('name');

    if($request->has('country_id')) {
        $models->where('country_id', $request->country_id);
    }

    if($request->has('city_id')) {
        $models->where('city_id', $request->city_id);
    }

    return $models->get();
});

Route::middleware('cors')->get('/countries', function(Request $request) {
    $models = Country::orderBy('order')->get();
    return $models;
});

Route::middleware('cors')->get('/cities', function(Request $request) {
    $models = City::orderBy('order');

    if($request->has('country_id')) {
        $models->where('country_id', $request->country_id);
    }

    return $models->get();
});

Route::get('/boutique/{boutique}/reviews/create', function(Request $request, Boutique $boutique) {
    
    $boutique->reviews()->create([
        'name' => $request->name,
        'date' => now(),
        'review' => $request->review,
        'rating' => $request->rating,
    ]);

})->name('boutique.review');