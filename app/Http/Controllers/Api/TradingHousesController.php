<?php

namespace App\Http\Controllers\Api;

use App\Boutique;
use App\Category;
use App\TradingHouse;
use Illuminate\Http\Request;
use App\Filters\TradingHouseFilter;
use App\Http\Controllers\Controller;

class TradingHousesController extends Controller
{
    public function index(Request $request, TradingHouseFilter $filter) {
        $models = TradingHouse::filter($filter)->orderBy('order');
    
        return $models->get();
    }

    public function categories(Request $request, TradingHouse $trading_house) {
        $categories = collect();
    
        $trading_house->boutiques->map(function($item) use ($categories) {
            foreach($item->categories as $category) {
                $categories->push($category);
            }
        });
    
        return $categories;
    }

    public function boutiquesByCategory(Request $request, TradingHouse $trading_house, Category $category) {
        $models = Boutique::whereHas('categories', function ($query) use ($category) {
            $query->where('categories.id', '=', $category->id);
        })->whereHas('tradingHouses', function ($query) use ($trading_house) {
            $query->where('trading_houses.id', '=', $trading_house->id);
        })->get();
    
        return $models;
    }
}
