<?php

namespace App\Http\Controllers\Api;

use App\Slider;
use Illuminate\Http\Request;
use App\Filters\SliderFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Traits\TranslatesCollection;

class SlidersController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, SliderFilter $filter)
    {
        $models = Slider::latest()->filter($filter)->get();
        $this->loadForCollection($models);

        return $models;
    }

    public function show(Slider $slider) {
        $this->loadForOne($slider);
        
        return $slider;
    }
}
