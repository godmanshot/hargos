<?php

namespace App;

use App\Block;

class BlockFactory {

    private $_cache = [];

    public function getAll()
    {
        $blocks = Block::all();

        return $blocks;
    }

    public function _($name)
    {
        if(isset($this->_cache[$name]))
        {
        
            return $this->_cache[$name]->getContent();
        
        } else {
        
            $block = Block::where('name', $name)->first();

            return $block ? ($this->_cache[$name] = $block)->getContent() : null;
            
        }
    }

}