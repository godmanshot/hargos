<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use Translatable;
    protected $translatable = ['content'];
    
    public function getContent($parent_div_class)
    {
        $id = $this->id;
        $parent_div_class = !empty($parent_div_class) ? $parent_div_class : env('MIX_EDITABLE_BLOCK_CLASS');
        $content = strip_tags($this->content, "");

        return "<div class='$parent_div_class' data-edit-id='$id' style='position:relative;margin:0px;padding: 0px;'>".$this->content."</div>";
    }
}
