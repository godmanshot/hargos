<?php

namespace App\Http\Controllers\Api;

use App\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultationController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'phone' => 'required|string'
        ]);

        Consultation::create($request->all());

        return response(['message' => trans('interface.message')], 201);
    }
}