<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CanFilterTrait;

class Country extends Model
{
    use CanFilterTrait;
}
