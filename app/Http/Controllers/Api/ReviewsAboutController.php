<?php

namespace App\Http\Controllers\Api;

use App\Review;
use Illuminate\Http\Request;
use App\Filters\ReviewFilter;
use App\Http\Controllers\Controller;

class ReviewsAboutController extends Controller
{
    public function index(Request $request, ReviewFilter $filter)
    {
        $models = Review::latest()->filter($filter);

        return $models->get();
    }
}
