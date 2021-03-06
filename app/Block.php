<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use Translatable;
    protected $translatable = ['content'];
    
    public function getContent($parent_div_class = null)
    {
        $id = $this->id;
        $parent_div_class = !empty($parent_div_class) ? $parent_div_class : env('MIX_EDITABLE_BLOCK_CLASS');
        // $content = strip_tags($this->getTranslatedAttribute('content'), "");

        return "<div class='$parent_div_class' data-edit-id='$id' style='position:relative;margin:0px;padding: 0px;display: contents;'>".$this->getTranslatedAttribute('content')."</div>";
    }
}
