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

Route::middleware('cors')->namespace('Api')->group(function() {

    Route::get('/token', 'AuthController@getToken');

    Route::get('/trading-house', 'TradingHousesController@index');
    Route::get('/trading-house/{trading_house}/categories', 'TradingHousesController@categories');
    Route::get('/trading-house/{trading_house}/boutiques-by-category/{category}', 'TradingHousesController@boutiquesByCategory');

    Route::get('/boutiques', 'BoutiquesController@index');
    Route::get('/boutique/{boutique}/reviews/create', 'ReviewsController@create')->name('boutique.review');
    Route::get('/boutique/reviews', 'BoutiqueReviewsController@index');

    Route::get('/categories', 'CategoriesController@index');

    Route::get('/tour-operators', 'TourOperatorsController@index');

    Route::get('/countries', 'CountriesController@index');

    Route::get('/cities', 'CitiesController@index');
});

Route::middleware(['cors', 'auth:api'])->group(function() {

    Route::get('/favorite', 'Api\FavoriteController@index');
    Route::post('/favorite/{boutique}', 'Api\FavoriteController@add');
    Route::delete('/favorite/{boutique}', 'Api\FavoriteController@delete');

});

