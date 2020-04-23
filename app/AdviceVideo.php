<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class AdviceVideo extends Model
{
    use Translatable, CanFilterTrait;
    protected $translatable = ['title'];
    public $appends = ["code"];

    public function getLazyIframeAttribute()
    {
        $code = str_replace('https://youtu.be/', '', $this->video);

        return '
        <iframe
            src="https://www.youtube.com/embed/'.$code.'"
            srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/'.$code.'?autoplay=1><img src=https://img.youtube.com/vi/'.$code.'/hqdefault.jpg><span>▶</span></a>"
            ></iframe>
        ';
    }

    public function getCodeAttribute()
    {
        return str_replace('https://youtu.be/', '', $this->video);
    }
}
