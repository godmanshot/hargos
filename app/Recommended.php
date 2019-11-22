<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Recommended extends Model
{
    use Translatable;
    protected $translatable = ['name', 'description'];

    public function boutique()
    {
        return $this->hasOne('App\Boutique', 'id');
    }

    public function getBoutiqueNameAttribute()
    {
        return $this->boutique->getTranslatedAttribute('name') ?? '';
    }

    public function getBoutiqueCategoriesAttribute()
    {
        return $this->boutique->categories->implode('name', ', ');
    }
}
