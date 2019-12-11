<?php

namespace App\Http\Controllers\Api;

use App\PopularBoutique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filters\PopularBoutiqueFilter;

class PopularBoutiquesController extends Controller
{
    public function index(Request $request, PopularBoutiqueFilter $filter)
    {
        $models = PopularBoutique::latest()->filter($filter);

        return $models->get();
    }
}
