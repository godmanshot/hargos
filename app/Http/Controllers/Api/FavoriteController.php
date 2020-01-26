<?php

namespace App\Http\Controllers\Api;

use App\Boutique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        return $user->favoriteBoutiques;
    }

    public function add(Request $request, Boutique $boutique) {
        $user = Auth::user();
    
        return $user->favorites()->create([
            'boutique_id' => $boutique->id
        ]);
    }

    public function delete(Request $request, Boutique $boutique) {
        $user = Auth::user();
        
        $user->favorites()->where('boutique_id', $boutique->id)->delete();

        return response(null, 204);
    }
}
