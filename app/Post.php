<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Translatable, CanFilterTrait;
    
    public $translatable = [
        'title',
        'description',
        'content',
    ];
}
