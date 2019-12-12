<?php

namespace App\Http\Controllers\Api;

use App\BestProduct;
use Illuminate\Http\Request;
use App\Filters\BestProductFilter;
use App\Http\Controllers\Controller;

class BestProductsController extends Controller
{
    public function index(Request $request, BestProductFilter $filter)
    {
        $models = BestProduct::latest()->filter($filter);

        return $models->get();
    }
}
