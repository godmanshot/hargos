<?php

namespace App\Http\Controllers\Api;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Feedback::create($request->all());

        return response(['message' => trans::get('interface.message')], 201);
    }
}