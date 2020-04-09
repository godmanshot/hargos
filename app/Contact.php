<?php

namespace App;

use TCG\Voyager\Traits\Spatial;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    use Translatable, Spatial;
    protected $translatable = ['address', 'phone', 'schedule'];
    protected $spatial = ['coordinates'];
}
