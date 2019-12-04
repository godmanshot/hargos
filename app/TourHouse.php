<?php

namespace App;

use App\CanFilterTrait;
use Illuminate\Database\Eloquent\Model;

class TourHouse extends Model
{
    use CanFilterTrait;

    public $with = [
        'sheldures'
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
}
