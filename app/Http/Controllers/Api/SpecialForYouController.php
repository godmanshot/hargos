<?php

namespace App\Http\Controllers\Api;

use App\SpecialForYou;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialForYouController extends Controller
{
    public function index(Request $request)
    {
        $models = SpecialForYou::latest();

        return $models->get();
    }
}
