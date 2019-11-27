<?php

namespace App\Http\Controllers\Api;

use App\Boutique;
use Illuminate\Http\Request;
use App\Filters\BoutiqueFilter;
use App\Http\Controllers\Controller;

class BoutiquesController extends Controller
{
    public function index(Request $request, BoutiqueFilter $filter) {
    
        $models = Boutique::latest()->filter($filter);
    
        return $models->get();
    }
}
