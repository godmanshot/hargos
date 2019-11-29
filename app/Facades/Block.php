<?php

namespace App\Facades;

use App\Block as BlockS;
use Illuminate\Support\Facades\Facade;

class Block extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'block'; }

    private static $_cache = [];

    public static function getAll()
    {
        $blocks = BlockS::all();

        return $blocks;
    }

    public static function _($name)
    {
        if(isset(static::$_cache[$name]))
        {
        
            return static::$_cache[$name]->getContent();
        
        } else {
        
            $block = BlockS::where('name', $name)->first();

            return $block ? (static::$_cache[$name] = $block)->getContent() : null;
            
        }
    }
}