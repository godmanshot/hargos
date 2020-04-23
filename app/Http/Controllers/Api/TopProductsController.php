<?php

namespace App\Http\Controllers\Api;

use App\TopProduct;
use Illuminate\Http\Request;
use App\Filters\TopProductFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Traits\TranslatesCollection;

class TopProductsController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, TopProductFilter $filter)
    {
        $models = TopProduct::latest()->filter($filter)->get();
        $this->loadForCollection($models);
        
        return $models;
    }
}
