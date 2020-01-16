<?php

namespace App\Http\Controllers\Api;

use App\Slider;
use Illuminate\Http\Request;
use App\Filters\SliderFilter;
use App\Http\Controllers\Controller;

class SlidersController extends Controller
{
    public function index(Request $request, SliderFilter $filter)
    {
        $models = Slider::latest()->filter($filter);

        return $models->get();
    }

    public function show(Slider $slider) {
        return $slider;
    }
}
