<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $with = ['slides'];

    public function slides()
    {
        return $this->hasMany('App\Slide');
    }
}
