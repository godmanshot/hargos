<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class EverydayTrip extends Model
{
    use Translatable;
    
    public $translatable = [
        'title',
        'dates_description',
        'price',
        'meeting_starts_at',
        'meeting_ends_at',
        'sub_title',
        'description'
    ];
}