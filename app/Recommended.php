<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommended extends Model
{
    public function boutique()
    {
        return $this->hasOne('App\Boutique', 'id');
    }

    public function getBoutiqueNameAttribute()
    {
        return $this->boutique->name ?? '';
    }

    public function getBoutiqueCategoriesAttribute()
    {
        return $this->boutique->categories->implode('name', ', ');
    }
}
