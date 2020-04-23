<?php

namespace App\Http\Controllers\Api;

use App\Interview;
use Illuminate\Http\Request;
use App\Filters\InterviewFilter;
use App\Http\Controllers\Controller;

class InterviewsController extends Controller
{
    public function index(Request $request, InterviewFilter $filter)
    {
        $models = Interview::latest()->filter($filter);
        
        return $models->get();
    }
}
