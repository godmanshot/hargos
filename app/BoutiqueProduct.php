<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class BoutiqueProduct extends Model
{
    use Translatable, CanFilterTrait;
    protected $translatable = ['name'];
    public $fillable = ['name', 'price_from', 'price_to'];
}
