<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class AllProduct extends Model
{
    use Translatable;
    
    protected $translatable = ['name'];
    public $fillable = ['name'];
}
