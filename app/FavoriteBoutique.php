<?php

namespace App;

use App\CanFilterTrait;
use Illuminate\Database\Eloquent\Model;

class FavoriteBoutique extends Model
{
    use CanFilterTrait;
    
    public $fillable = ['boutique_id'];
}
