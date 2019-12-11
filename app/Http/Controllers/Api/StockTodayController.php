<?php

namespace App\Http\Controllers\Api;

use App\StockToday;
use Illuminate\Http\Request;
use App\Filters\StockTodayFilter;
use App\Http\Controllers\Controller;

class StockTodayController extends Controller
{
    public function index(Request $request, StockTodayFilter $filter)
    {
        $models = StockToday::latest()->filter($filter);

        return $models->get();
    }
}
