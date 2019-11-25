<?php

namespace App\Http\Controllers\Api;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
    public function index(Request $request) {
        $models = Country::orderBy('order')->get();
        return $models;
    }
}
