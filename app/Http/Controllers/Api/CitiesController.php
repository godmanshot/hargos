<?php

namespace App\Http\Controllers\Api;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function index(Request $request) {
        $models = City::orderBy('order');
    
        if($request->has('country_id')) {
            $models->where('country_id', $request->country_id);
        }
    
        return $models->get();
    }
}
