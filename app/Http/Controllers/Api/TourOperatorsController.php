<?php

namespace App\Http\Controllers\Api;

use App\TourHouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;

class TourOperatorsController extends Controller
{
    use LoadsAllTranslations;
    
    public function index(Request $request) {
        $models = TourHouse::orderBy('name');
    
        if($request->has('country_id')) {
            $models->where('country_id', $request->country_id);
        }
    
        if($request->has('city_id')) {
            $models->where('city_id', $request->city_id);
        }
    
        if($request->has('id')) {
            $models->where('id', $request->id);
        }
        
        $models = $models->get();

        if($request->mobile_app) {
            $this->loadForCollection($models);
        } else {
            $models = $models->map(function($model) {
                $model->sheldures = $model->sheldures->map(function($sheldure) {
                    return $sheldure->translate(app()->getLocale());
                });
                return $model->translate(app()->getLocale());
            });
        }

        return $models;
    }
}
