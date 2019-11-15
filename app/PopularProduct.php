<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class PopularProduct extends Model
{
    use Translatable;
    protected $translatable = ['name', 'description'];
}
