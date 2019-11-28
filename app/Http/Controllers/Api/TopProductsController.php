<?php

namespace App\Http\Controllers\Api;

use App\TopProduct;
use Illuminate\Http\Request;
use App\Filters\TopProductFilter;
use App\Http\Controllers\Controller;

class TopProductsController extends Controller
{
    public function index(Request $request, TopProductFilter $filter)
    {
        $models = TopProduct::latest()->filter($filter);

        return $models->get();
    }
}
