<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use Translatable, CanFilterTrait;

    protected $translatable = [
        'name',
        'seller_name',
        'floor',
        'boutique_number',
        'owner_name',
        'languages',
        'full_description',
    ];

    protected $appends = ['firstImage', 'categoriesName', 'averageRating'];

    public $with = ['categories', 'tradingHouses', 'products', 'reviews', 'recommendedRelations', 'relatedRelations'];

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

    public function allProducts()
    {
        return $this->hasMany('App\AllProduct');
    }

    public function reviews()
    {
        return $this->hasMany('App\BoutiqueReview');
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->selectRaw("AVG(rating) as rating")->first();
    }

    public function getAverageRatingHtmlAttribute()
    {
        return "
        <label class=\"star-rating__ico star-rating__hover fa fa-star fa-lg ".(($this->averageRating->rating ?? 0) >= 5 ? 'star-rating__checked' : '')."\">
            <input class=\"star-rating__input\" type=\"radio\" name=\"rating\" value=\"5\">
        </label>
        <label class=\"star-rating__ico star-rating__hover fa fa-star fa-lg ".(($this->averageRating->rating ?? 0) >= 4 ? 'star-rating__checked' : '')."\">
            <input class=\"star-rating__input\" type=\"radio\" name=\"rating\" value=\"4\" checked>
        </label>
        <label class=\"star-rating__ico star-rating__hover fa fa-star fa-lg ".(($this->averageRating->rating ?? 0) >= 3 ? 'star-rating__checked' : '')."\">
            <input class=\"star-rating__input\" type=\"radio\" name=\"rating\" value=\"3\">
        </label>
        <label class=\"star-rating__ico star-rating__hover fa fa-star fa-lg ".(($this->averageRating->rating ?? 0) >= 2 ? 'star-rating__checked' : '')."\">
            <input class=\"star-rating__input\" type=\"radio\" name=\"rating\" value=\"2\">
        </label>
        <label class=\"star-rating__ico star-rating__hover fa fa-star fa-lg ".(($this->averageRating->rating ?? 0) >= 1 ? 'star-rating__checked' : '')."\">
            <input class=\"star-rating__input\" type=\"radio\" name=\"rating\" value=\"1\">
        </label>";
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

    public function recommendedRelations()
    {
        return $this->hasMany('App\RecommendedBoutique');
    }

    public function relatedRelations()
    {
        return $this->hasMany('App\RelatedBoutique');
    }
}
