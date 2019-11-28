<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class TopProduct extends Model
{
    use Translatable, CanFilterTrait;
    protected $translatable = ['name'];
}
