<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use Translatable;
    public $fillable = ['title'];
    protected $translatable = ['title', 'content'];
}
