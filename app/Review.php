<?php

namespace App;

use App\CanFilterTrait;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use CanFilterTrait;
}
