<?php

namespace App\Http\Controllers\Api;

use App\Help;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function index(Request $request)
    {
        $models = Help::latest()->whereNotNull('content');

        return $models->get();
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $model = Help::create([
            'title' => $request->title
        ]);

        return $model;
    }
}
