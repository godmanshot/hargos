<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function updateUserInfo(Request $request) {
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

        return redirect()->back()->with('updated', true);
    }

    public function favorites() {
        $boutiques = auth()->user()->favoriteBoutiques;

        return view('favorites', compact('boutiques'));
    }
}
