<?php

namespace App\Http\Controllers\Api;

use App\Boutique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoutiquesController extends Controller
{
    public function index(Request $request) {

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
    }
}
