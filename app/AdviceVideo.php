<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class AdviceVideo extends Model
{
    use Translatable, CanFilterTrait;
    protected $translatable = ['title'];
}
