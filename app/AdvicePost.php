<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class AdvicePost extends Model
{
    use Translatable;
    protected $translatable = ['title', 'description', 'content'];
}
