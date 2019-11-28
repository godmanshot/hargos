<?php

namespace App\Http\Controllers\Api;

use App\Recommended;
use Illuminate\Http\Request;
use App\Filters\RecommendedFilter;
use App\Http\Controllers\Controller;

class RecommendedController extends Controller
{
    public function index(Request $request, RecommendedFilter $filter)
    {
        $models = Recommended::latest()->filter($filter);

        return $models->get();
    }
}
