<?php

namespace App\Http\Controllers\Api;

use App\Review;
use App\Boutique;
use App\BoutiqueReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function create(Request $request, Boutique $boutique) {
        $user_id = Auth::user()->id;
        
        $boutique->reviews()->create([
            'name' => $request->name,
            'date' => now(),
            'review' => $request->review,
            'rating' => $request->rating,
            'user_id' => $user_id,
        ]);
        
        return response('Отзыв оставлен', 201);
    }

    public function update(Request $request, Boutique $boutique, BoutiqueReview $review) {
        $user_id = Auth::user()->id;

        $review_user_id = $review->user_id;

        if($user_id != $review_user_id) {
            abort(403);
        }

        $review->fill($request->all());

        $review->save();

        return response('Отзыв обновлен', 201);
    }
}
