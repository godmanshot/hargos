<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class CategoryStock extends Model
{
    use Translatable, CanFilterTrait;
    
    protected $translatable = ['name'];

    public $with = ['category'];

    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function getCategoryNameAttribute()
    {
        if($this->category) {
            return $this->category->getTranslatedAttribute('name') ?? '';
        }
    }

    public function getCategoryLinkAttribute()
    {
        return $this->category ? route('trading-houses', ['category' => $this->category_id]) : '#';
    }
}
