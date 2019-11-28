<?php

namespace App\Http\Controllers\Api;

use App\Freebie;
use Illuminate\Http\Request;
use App\Filters\FreebieFilter;
use App\Http\Controllers\Controller;

class FreebiesController extends Controller
{
    public function index(Request $request, FreebieFilter $filter)
    {
        $models = Freebie::latest()->filter($filter);

        return $models->get();
    }
}
