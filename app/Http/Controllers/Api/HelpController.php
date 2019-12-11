<?php

namespace App\Http\Controllers\Api;

use App\Help;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function index(Request $request)
    {
        $models = Help::latest();

        return $models->get();
    }
}
