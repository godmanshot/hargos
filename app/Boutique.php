<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use Translatable;
    protected $translatable = ['name'];

    public $with = ['categories', 'tradingHouses', 'products'];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'boutique_categories');
    }

    public function getCategoriesNameAttribute()
    {
        $categories = $this->categories;

        return $categories->implode('name', ', ');
    }

    public function tradingHouses()
    {
        return $this->belongsToMany('App\TradingHouse', 'boutique_trading_houses');
    }

    public function getTradingHousesNameAttribute()
    {
        $tradingHouses = $this->tradingHouses;

        return $tradingHouses->implode('name', ', ');
    }

    public function products()
    {
        return $this->hasMany('App\BoutiqueProduct');
    }
}
