<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Freebie extends Model
{
    use Translatable, CanFilterTrait;

    protected $translatable = ['name', 'description'];
}
