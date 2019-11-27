<?php

namespace App\Http\Controllers\Api;

use App\BoutiqueReview;
use App\Filters\BoutiqueReviewFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoutiqueReviewsController extends Controller
{
    public function index(Request $request, BoutiqueReviewFilter $filter)
    {
        $model = BoutiqueReview::latest()->filter($filter);

        return $model->get();
    }
}
