<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getToken(Request $request) {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
    
        $credentials = request(['email', 'password']);
    
        if(!Auth::attempt($credentials)) {
    
            return response()->json(['message' => 'Unauthorized'], 401);
    
        }
    
        $user = $request->user();
    
        $tokenResult = $user->createToken('Personal Access Token');
    
        $token = $tokenResult->token;
    
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
        ]);
    }
}
