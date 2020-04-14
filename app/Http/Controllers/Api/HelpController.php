<?php

namespace App\Http\Controllers\Api;

use App\Help;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;

class HelpController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request)
    {
        $models = Help::latest()->whereNotNull('content')->get();
        $this->loadForCollection($models);
        
        return $models;
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
