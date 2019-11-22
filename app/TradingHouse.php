<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class TradingHouse extends Model
{
    use Translatable;
    protected $translatable = ['name'];
    // protected $appends = ['test'];
    // public function getTestAttribute()
    // {
    //     return 123123;
    // }

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