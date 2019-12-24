<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Facades\Lang;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Feedback::create($request->all());

        return response(['message' => Lang::get('interface.message')], 201);
    }
}