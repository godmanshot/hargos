<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Filters\CategoryFilter;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(Request $request, CategoryFilter $filter)
    {
        $models = Category::latest()->filter($filter);

        return $models->get();
    }
}
