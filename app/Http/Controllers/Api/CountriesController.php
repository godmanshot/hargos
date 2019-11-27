<?php

namespace App\Http\Controllers\Api;

use App\Country;
use Illuminate\Http\Request;
use App\Filters\CountryFilter;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
    public function index(Request $request, CountryFilter $filter) {

        $models = Country::filter($filter)->orderBy('order');

        return $models->get();
    }
}
