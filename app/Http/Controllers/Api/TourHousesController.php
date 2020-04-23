<?php

namespace App\Http\Controllers\Api;

use App\TourHouse;
use Illuminate\Http\Request;
use App\Filters\TourHouseFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;

class TourHousesController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, TourHouseFilter $filter)
    {
        $models = TourHouse::latest()->filter($filter)->get();
        $this->loadForCOllection($models);

        return $models;
    }
}
