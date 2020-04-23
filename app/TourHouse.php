<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class TourHouse extends Model
{
    use CanFilterTrait, Translatable;

    public $with = [
        'sheldures',
        'slider'
    ];
    
    public $translatable = [
        'house_name',
        'name',
        'title',
        'description',
        'content',
        'phone_1',
        'phone_name_1',
        'phone_2',
        'phone_name_2',
        'tour_content',
        'tour_description',
    ];

    public function sheldures()
    {
        return $this->hasMany('App\TourHouseSheldure');
    }

    public function slider()
    {
        return $this->hasMany('App\TourHouseSlider');
    }
}
