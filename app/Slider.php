<?php

namespace App;

use App\CanFilterTrait;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use CanFilterTrait;
    
    public $with = ['slides'];

    public function slides()
    {
        return $this->hasMany('App\Slide');
    }
}
