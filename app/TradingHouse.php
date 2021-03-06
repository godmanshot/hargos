<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class TradingHouse extends Model
{
    use Translatable, CanFilterTrait;
    
    protected $translatable = ['name'];

    public function boutiques()
    {
        return $this->belongsToMany('App\Boutique', 'boutique_trading_houses');
    }

    public function getBoutiquesCategoriesAttribute()
    {
        $categories = collect();

        $this->boutiques->map(function($item) use ($categories) {
            foreach($item->categories as $category) {
                $categories->put($category->id, $category);
            }
        });

        return $categories;
    }
}