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
    public $appends = ['priceFromDollar', 'priceToDollar', 'priceFromTenge', 'priceToTenge', 'priceFromRub', 'priceToRub'];

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
            

            $tmp = collect(json_decode($json))->keyBy('kod');
            $cny_converter = json_decode(file_get_contents('https://api.exchangeratesapi.io/latest?base=CNY&symbols=USD,RUB'));

            self::$currency_json = [];
            self::$currency_json['KZT'] = $tmp['CNY']->kurs;
            self::$currency_json['USD'] = $cny_converter->rates->USD;
            self::$currency_json['RUB'] = $cny_converter->rates->RUB;
        }
        
        return self::$currency_json;
    }
    
    public function getPriceFromCnyAttribute() {
        return round($this->price_from, 2);
    }
    
    public function getPriceToCnyAttribute() {
        return round($this->price_to, 2);
    }

    public function getPriceFromDollarAttribute() {
        $currency = self::currency()['USD'];
        return round($this->price_from*$currency, 2);
    }
    
    public function getPriceToDollarAttribute() {
        $currency = self::currency()['USD'];
        return round($this->price_to*$currency, 2);
    }
    
    public function getPriceFromTengeAttribute() {
        $currency = self::currency()['KZT'];
        return round($this->price_from*$currency, 2);
    }
    
    public function getPriceToTengeAttribute() {
        $currency = self::currency()['KZT'];
        return round($this->price_to*$currency, 2);
    }
    
    public function getPriceFromRubAttribute() {
        $currency = self::currency()['RUB'];
        return round($this->price_from*$currency, 2);
    }
    
    public function getPriceToRubAttribute() {
        $currency = self::currency()['RUB'];
        return round($this->price_to*$currency, 2);
    }
    
}
