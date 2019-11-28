<?php

namespace App\Http\Controllers\Api;

use App\TourHouse;
use Illuminate\Http\Request;
use App\Filters\TourHouseFilter;
use App\Http\Controllers\Controller;

class TourHousesController extends Controller
{
    public function index(Request $request, TourHouseFilter $filter)
    {
        $models = TourHouse::latest()->filter($filter);

        return $models->get();
    }
}
