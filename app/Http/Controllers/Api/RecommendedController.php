<?php

namespace App\Http\Controllers\Api;

use App\Recommended;
use Illuminate\Http\Request;
use App\Filters\RecommendedFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Traits\TranslatesCollection;

class RecommendedController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, RecommendedFilter $filter)
    {
        $models = Recommended::latest()->filter($filter)->get();
        $this->loadForCollection($models);

        return $models;
    }
}
