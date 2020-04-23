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

    Route::post('/forgot-password', 'ForgotPasswordController@sendResetLinkEmail');
    Route::get('/maps', function() {
        return response(\App\Map::first());
    });
    Route::get('/token', 'AuthController@getToken');

    Route::post('/register', 'AuthController@register');

    Route::get('/trading-house', 'TradingHousesController@index');
    Route::get('/trading-house/{trading_house}/categories', 'TradingHousesController@categories');
    Route::get('/trading-house/{trading_house}/boutiques-by-category/{category}', 'TradingHousesController@boutiquesByCategory');

    Route::get('/boutiques', 'BoutiquesController@index');
    Route::get('/boutique/reviews', 'BoutiqueReviewsController@index');

    Route::get('/categories', 'CategoriesController@index');

    Route::get('/tour-operators', 'TourOperatorsController@index');

    Route::get('/countries', 'CountriesController@index');

    Route::get('/cities', 'CitiesController@index');

    Route::get('/freebies', 'FreebiesController@index');

    Route::get('/interviews', 'InterviewsController@index');

    Route::get('/popular-products', 'PopularProductsController@index');

    Route::get('/posts', 'PostsController@index');

    Route::get('/recommended', 'RecommendedController@index');

    Route::get('/reviews-about', 'ReviewsAboutController@index');

    Route::get('/sliders', 'SlidersController@index');
    Route::get('/sliders/{slider}', 'SlidersController@show');

    Route::get('/top-products', 'TopProductsController@index');

    Route::get('/tour-houses', 'TourHousesController@index');

    Route::get('/trading-houses', 'TradingHousesController@index');
    Route::get('/advices/categories', 'AdvicesController@categories');
    Route::get('/advices/posts', 'AdvicesController@posts');
    Route::get('/advices/videos', 'AdvicesController@videos');

    Route::get('/category-stocks', 'CategoryStocksController@index');

    Route::get('/customer-choices', 'CustomerChoicesController@index');

    Route::get('/popular-boutiques', 'PopularBoutiquesController@index');
 
    Route::get('/stock-today', 'StockTodayController@index');

    Route::get('/video-about-horgos', 'VideoHorgosController@index');

    Route::get('/special-for-you', 'SpecialForYouController@index');

    Route::get('/help', 'HelpController@index');

    Route::post('/help', 'HelpController@create');

    Route::get('/best-products', 'BestProductsController@index');

    Route::post('/feedback', 'FeedbackController@store');

    Route::post('/consultations', 'ConsultationController@store');

    Route::get('/search-words', function(Request $request) {

        if(empty($request->word)) {
            $res = collect(
                DB::select(
                    DB::raw("
                        (SELECT name FROM trading_houses) UNION
                        (SELECT name FROM all_products) UNION
                        (SELECT name FROM categories) UNION
                        (SELECT name FROM boutique_products) UNION
                        (SELECT name FROM boutiques) UNION
                        (SELECT boutique_number FROM boutiques) UNION
                        (SELECT seller_name FROM boutiques) UNION
                        (SELECT owner_name FROM boutiques)
                    ")
                )
            );
        } else {
            $res = collect(
                DB::select(
                    DB::raw("
                        (SELECT name FROM trading_houses WHERE name LIKE '%".$request->word."%') UNION
                        (SELECT name FROM all_products WHERE name LIKE '%".$request->word."%') UNION
                        (SELECT name FROM categories WHERE name LIKE '%".$request->word."%') UNION
                        (SELECT name FROM boutique_products WHERE name LIKE '%".$request->word."%') UNION
                        (SELECT name FROM boutiques WHERE name LIKE '%".$request->word."%') UNION
                        (SELECT boutique_number FROM boutiques WHERE boutique_number LIKE '%".$request->word."%') UNION
                        (SELECT seller_name FROM boutiques WHERE seller_name LIKE '%".$request->word."%') UNION
                        (SELECT owner_name FROM boutiques WHERE owner_name LIKE '%".$request->word."%')
                    ")
                )
            );
        }

        return $res->pluck('name')->sort();
    });
});

Route::middleware(['cors', 'auth:api'])->group(function() {
    Route::get('user', 'Api\UserController@index');
    Route::post('user/update', 'Api\UserController@update');
    Route::get('/favorite', 'Api\FavoriteController@index');
    Route::post('/favorite/{boutique}', 'Api\FavoriteController@add');
    Route::delete('/favorite/{boutique}', 'Api\FavoriteController@delete');

    Route::get('/boutique/{boutique}/reviews/create', 'Api\ReviewsController@create')->name('boutique.review');
    Route::get('/boutique/{boutique}/reviews/{review}/update', 'Api\ReviewsController@update')->name('boutique.review.update');
});