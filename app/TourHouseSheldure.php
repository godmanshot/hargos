<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class TourHouseSheldure extends Model
{
    use CanFilterTrait, Translatable;
    protected $translatable = [
        'title',
        'tour_dates',
        'price',
        'times',
        'periods',
        'address'
    ];
}