<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class EverydayTrip extends Model
{
    use Translatable;
    
    public $translatable = [
        'title',
        'dates',
        'sub_title',
        'description'
    ];

}

// 'title',
// 'dates',
// 'price',
// 'meeting_time',
// 'sub_title',
// 'description'