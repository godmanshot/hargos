<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Freebie extends Model
{
    use Translatable, CanFilterTrait;

    protected $translatable = ['name', 'description', 'boutique_id'];

    public function boutique()
    {
        return $this->hasOne('App\Boutique', 'id', 'boutique_id');
    }

    public function getBoutiqueNameAttribute()
    {
        return $this->boutique->getTranslatedAttribute('name') ?? '';
    }

    public function getBoutiqueCategoriesAttribute()
    {
        return $this->boutique->categories->implode('name', ', ');
    }

    public function getBoutiqueLinkAttribute()
    {
        return $this->boutique ? route('boutique', $this->boutique->id) : '#';
    }
}
