<?php

use App\Slider;
use App\Recommended;

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
    $recommended = Recommended::all();

    return view('hello', compact('hello_slider', 'special_slider', 'recommended'));
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
