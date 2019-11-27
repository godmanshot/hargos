<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable, CanFilterTrait;
    protected $translatable = ['name'];
    
    public function boutiques()
    {
        return $this->belongsToMany('App\Boutique', 'boutique_categories');
    }
    
}
