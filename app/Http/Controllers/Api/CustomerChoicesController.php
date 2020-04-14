<?php

namespace App\Http\Controllers\Api;

use App\CustomerChoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Filters\CustomerChoiceFilter;

class CustomerChoicesController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, CustomerChoiceFilter $filter)
    {
        $models = CustomerChoice::latest()->filter($filter)->get();
        $this->loadForCollection($models);
        
        return $models;
    }
}
