<?php

namespace App\Http\Controllers\Api;

use App\VideoHorgos;
use Illuminate\Http\Request;
use App\Filters\VideoHorgosFilter;
use App\Http\Controllers\Controller;

class VideoHorgosController extends Controller
{
    public function index(Request $request, VideoHorgosFilter $filter)
    {
        $models = VideoHorgos::latest()->filter($filter);

        return $models->get();
    }
}
