<?php

namespace App\Http\Controllers\Api;

use App\CategoryStock;
use Illuminate\Http\Request;
use App\Filters\CategoryStockFilter;
use App\Http\Controllers\Controller;

class CategoryStocksController extends Controller
{
    public function index(Request $request, CategoryStockFilter $filter)
    {
        $models = CategoryStock::latest()->filter($filter);

        return $models->get();
    }
}
