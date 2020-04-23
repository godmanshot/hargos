<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Lang extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'lang'; }

    public static function lang()
    {
        return 'ru';
    }

    public function setLocaleFromCookie()
    {
        return 'ru';
    }
}