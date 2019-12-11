<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Translatable, CanFilterTrait;
    
    public $with = ['slides'];

    public function slides()
    {
        return $this->hasMany('App\Slide');
    }
}
