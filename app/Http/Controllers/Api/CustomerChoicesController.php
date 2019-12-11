<?php

namespace App\Http\Controllers\Api;

use App\CustomerChoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filters\CustomerChoiceFilter;

class CustomerChoicesController extends Controller
{
    public function index(Request $request, CustomerChoiceFilter $filter)
    {
        $models = CustomerChoice::latest()->filter($filter);

        return $models->get();
    }
}
