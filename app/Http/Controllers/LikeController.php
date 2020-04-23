<?php

namespace App\Http\Controllers;

use App\Like;
use App\Review;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request, Review $review) {
        $data = [
            'entity_type' => Review::class,
            'entity_id' => $review->id,
        ];

        if(auth()->check()) {
            $data['user_id'] = auth()->user()->id;
        } else {
            $data['ip_address'] = $request->server()['REMOTE_ADDR'];
        }

        $likeExists = Like::where($data)->where('type', 'like')->exists();
        $dislike = Like::where($data)->where('type', 'dislike')->first();
        $data['type'] = 'like';
        if($dislike) {
            $dislike->delete();
            Like::create($data);
        } elseif(!$likeExists) {
            Like::create($data);
        }

        return response(['likes' => $review->getLikes(), 'dislikes' => $review->getDislikes()]);
    }
    
    public function dislike(Request $request, Review $review) {
        $data = [
            'entity_type' => Review::class,
            'entity_id' => $review->id,
        ];

        if(auth()->check()) {
            $data['user_id'] = auth()->user()->id;
        } else {
            $data['ip_address'] = $request->server()['REMOTE_ADDR'];
        }

        $like = Like::where($data)->where('type', 'like')->first();
        $dislikeExists = Like::where($data)->where('type', 'dislike')->exists();
        $data['type'] = 'dislike';
        if($like) {
            $like->delete();
            Like::create($data);
        } elseif(!$dislikeExists) {
            Like::create($data);
        }

        return response(['likes' => $review->getLikes(), 'dislikes' => $review->getDislikes()]);
    }
}
