<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use Translatable;
    protected $translatable = ['name'];
    protected $appends = ['firstImage', 'categoriesName'];
    // public function getTestAttribute()
    // {
    //     return 123123;
    // }

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

    public function reviews()
    {
        return $this->hasMany('App\BoutiqueReview');
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->selectRaw("AVG(rating) as rating")->first();
    }

    public function getImagesArrayAttribute()
    {
        return !empty($this->images) ? json_decode($this->images, true) : [];
    }

    public function getFirstImageAttribute()
    {
        $images = $this->imagesArray;

        return !empty($images) ? $images[0] : '';
    }

    public function recommended()
    {
        return $this->belongsToMany('App\Boutique', 'recommended_boutiques', 'boutique_id');
    }

    public function related()
    {
        return $this->belongsToMany('App\Boutique', 'related_boutiques', 'boutique_id');
    }
}
