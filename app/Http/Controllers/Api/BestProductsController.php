<?php

namespace App\Http\Controllers\Api;

use App\BestProduct;
use Illuminate\Http\Request;
use App\Filters\BestProductFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;

class BestProductsController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, BestProductFilter $filter)
    {
        $models = BestProduct::latest()->filter($filter)->get();
        $this->loadForCollection($models);

        return $models;
    }
}
