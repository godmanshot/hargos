<?php

namespace App;

use App\CanFilterTrait;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use CanFilterTrait;
}
