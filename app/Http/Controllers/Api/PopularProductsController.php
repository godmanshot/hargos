<?php

namespace App\Http\Controllers\Api;

use App\PopularProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Traits\TranslatesCollection;
use App\Filters\PopularProductFilter;

class PopularProductsController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, PopularProductFilter $filter)
    {
        $models = PopularProduct::latest()->filter($filter)->get();
        $this->loadForCollection($models);
        // dd($models); 
        return $models;
    }
}
