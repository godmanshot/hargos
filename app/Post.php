<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Translatable;
    
    public $translatable = [
        'title',
        'description',
        'content',
    ];
}
