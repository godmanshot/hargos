<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class AdviceCategory extends Model
{
    use Translatable, CanFilterTrait;
    protected $translatable = ['name'];
}
