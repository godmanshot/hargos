<?php

namespace App\Http\Controllers\Api;

use App\StockToday;
use Illuminate\Http\Request;
use App\Filters\StockTodayFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;

class StockTodayController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, StockTodayFilter $filter)
    {
        $models = StockToday::latest()->filter($filter)->get();
        $this->loadForCollection($models);
        
        return $models;
    }
}
