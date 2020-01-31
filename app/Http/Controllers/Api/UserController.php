<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function index(Request $request) {
        return response([
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'avatar' => $request->user()->avatar
        ]);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->user()->id,
            'password' => 'nullable|string|min:6|confirmed'
        ]);

        $photo = null;
        if($request->has('photo')) {
            $photo = $request->file('photo')->store('/users'.$request->user()->id, 'public');    
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        
        if($photo) {
            $data['avatar'] = $photo;
        }

        $request->user()
            ->update($data);

        return response(['message' => 'Updated']);
    }
}