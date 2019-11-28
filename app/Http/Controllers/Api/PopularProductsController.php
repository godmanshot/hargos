<?php

namespace App\Http\Controllers\Api;

use App\PopularProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filters\PopularProductFilter;

class PopularProductsController extends Controller
{
    public function index(Request $request, PopularProductFilter $filter)
    {
        $models = PopularProduct::latest()->filter($filter);

        return $models->get();
    }
}
