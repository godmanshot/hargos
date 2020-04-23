<?php

namespace App\Http\Controllers\Api;

use App\Boutique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    use LoadsAllTranslations;
    public function index(Request $request)
    {
        $user = Auth::user();
        $models = $user->favoriteBoutiques;
        $this->loadForCollection($models);
        
        return $models;
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
