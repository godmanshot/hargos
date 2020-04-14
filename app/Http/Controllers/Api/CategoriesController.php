<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Filters\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Traits\TranslatesCollection;

class CategoriesController extends Controller
{
    use LoadsAllTranslations;
    public function index(Request $request, CategoryFilter $filter)
    {
        $models = Category::latest()->filter($filter)->get();
        $this->loadForCollection($models);
        
        return $models;
    }
}
