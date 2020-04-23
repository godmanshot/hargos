<?php

namespace App\Http\Controllers\Api;

use App\SpecialForYou;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;

class SpecialForYouController extends Controller
{
    use LoadsAllTranslations;
    
    public function index(Request $request)
    {
        $models = SpecialForYou::latest()->get();
        $this->loadForCollection($models);

        return $models;
    }
}
