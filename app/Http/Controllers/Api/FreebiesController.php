<?php

namespace App\Http\Controllers\Api;

use App\Freebie;
use Illuminate\Http\Request;
use App\Filters\FreebieFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Traits\TranslatesCollection;

class FreebiesController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, FreebieFilter $filter)
    {
        $models = Freebie::latest()->filter($filter)->get();
        $this->loadForCollection($models);
    
        return $models;
    }
}
