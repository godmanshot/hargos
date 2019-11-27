<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourHouse extends Model
{
    
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
}
