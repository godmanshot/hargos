<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'table_name',
        'column_name',
        'foreign_key',
        'locale',
        'value'
    ];

    static public function getDefaultLocale() {
        return config('voyager.multilingual.default');
    }

    static public function getLocales() {
        return array_diff(config('voyager.multilingual.locales'), [config('voyager.multilingual.default')]);
    }
}
