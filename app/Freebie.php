<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Freebie extends Model
{
    use Translatable;
    protected $translatable = ['name', 'description'];
}
