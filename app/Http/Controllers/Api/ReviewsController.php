<?php

namespace App\Http\Controllers\Api;

use App\Review;
use App\Boutique;
use App\BoutiqueReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function create(Request $request, Boutique $boutique) {
        $boutique->reviews()->create([
            'name' => $request->name,
            'date' => now(),
            'review' => $request->review,
            'rating' => $request->rating,
        ]);
        
        return response('Отзыв оставлен', 201);
    }

    public function update(Request $request, Boutique $boutique, BoutiqueReview $review) {

        $review->fill($request->all());

        $review->save();

        return response('Отзыв обновлен', 201);
    }
}
