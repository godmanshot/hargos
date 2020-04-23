<?php

namespace App;

use App\Slide;
use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Translatable, CanFilterTrait;
    
    protected $translatable = ['name'];

    public $with = ['slides'];

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }
}