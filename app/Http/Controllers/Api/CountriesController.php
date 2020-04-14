<?php

namespace App\Http\Controllers\Api;

use App\Country;
use Illuminate\Http\Request;
use App\Filters\CountryFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Traits\TranslatesCollection;

class CountriesController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, CountryFilter $filter) {

        $models = Country::filter($filter)->orderBy('order')->get();
        $this->loadForCollection($models);

        return $models;
    }
}
