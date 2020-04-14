<?php

namespace App\Http\Controllers\Api;

use App\CategoryStock;
use Illuminate\Http\Request;
use App\Filters\CategoryStockFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;

class CategoryStocksController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, CategoryStockFilter $filter)
    {
        $models = CategoryStock::latest()->filter($filter)->get();
        $this->loadForCollection($models);
        
        return $models;
    }
}
