<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Filters\CityFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index(Request $request, CityFilter $filter) {

        $models = City::filter($filter)->orderBy('order');
        
        return $models->get();
        
    }
}
