<?php

namespace App;

use App\CanFilterTrait;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class BoutiqueProduct extends Model
{
    use Translatable, CanFilterTrait;
    protected $translatable = ['name'];
    public $fillable = ['name', 'price_from', 'price_to'];
    public $append = ['priceFromDollar', 'priceToDollar', 'priceFromTenge', 'priceToTenge'];

    static $currency_json = false;

    static function currency() {
        if(!self::$currency_json) {
            $currency_path = storage_path('currency.json');

            if( (filemtime(storage_path('currency.json')) - time()) > 60*60*24*7 ) {
                $json = file_get_contents('https://data.egov.kz/datasets/exportjson?index=valutalar_bagamdary4&from=1&count=10000');
                file_put_contents($currency_path, $json);
            } else {
                $json = file_get_contents($currency_path);
            }
            

            self::$currency_json = collect(json_decode($json))->keyBy('kod');

        }
        
        return self::$currency_json;
    }

    public function getPriceFromDollarAttribute() {
        $currency = self::currency()['USD']->kurs;
        return $this->priceFromTenge*$currency;
    }
    
    public function getPriceToDollarAttribute() {
        $currency = self::currency()['USD']->kurs;
        return $this->priceToTenge*$currency;
    }
    
    public function getPriceFromTengeAttribute() {
        $currency = self::currency()['CNY']->kurs;
        return $this->price_from*$currency;
    }
    
    public function getPriceToTengeAttribute() {
        $currency = self::currency()['CNY']->kurs;
        return $this->price_to*$currency;
    }
    
}
