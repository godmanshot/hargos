<?php

namespace App\Http\Controllers\Api;

use App\PopularBoutique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Filters\PopularBoutiqueFilter;

class PopularBoutiquesController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, PopularBoutiqueFilter $filter)
    {
        $models = PopularBoutique::latest()->filter($filter)->get();
        $this->loadForCollection($models);
        
        return $models;
    }
}
