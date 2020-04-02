<?php

namespace App\Http\Controllers\Api;

use App\TourHouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourOperatorsController extends Controller
{
    public function index(Request $request) {

        $models = TourHouse::orderBy('name');
    
        if($request->has('country_id')) {
            $models->where('country_id', $request->country_id);
        }
    
        if($request->has('city_id')) {
            $models->where('city_id', $request->city_id);
        }
    
        if($request->has('id')) {
            $models->where('id', $request->id);
        }
        
        return $models->get();
    }
}
