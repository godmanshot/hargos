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

Route::middleware('cors')->group(function() {

    Route::get('/trading-house', 'Api\TradingHousesController@index');
    Route::get('/trading-house/{trading_house}/categories', 'Api\TradingHousesController@categories');
    Route::get('/trading-house/{trading_house}/boutiques-by-category/{category}', 'Api\TradingHousesController@boutiquesByCategory');
    Route::get('/boutiques', 'Api\BoutiquesController@index');
    Route::get('/tour-operators', 'Api\TourOperatorsController@index');
    Route::get('/countries', 'Api\CountriesController@index');
    Route::get('/cities', 'Api\CitiesController@index');
    Route::get('/boutique/{boutique}/reviews/create', 'Api\ReviewsController@create')->name('boutique.review');

    Route::get('/token', 'App\AuthController@getToken');
});

Route::middleware(['cors', 'auth:api'])->group(function() {

    Route::get('/favorite', 'Api\FavoriteController@index');
    Route::post('/favorite/{boutique}', 'Api\FavoriteController@add');
    Route::delete('/favorite/{boutique}', 'Api\FavoriteController@delete');

});

