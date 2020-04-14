<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Filters\CityFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Traits\TranslatesCollection;

class CitiesController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, CityFilter $filter) {

        $models = City::filter($filter)->orderBy('order')->get();
        $this->loadForCollection($models);

        return $models;
        
    }
}
