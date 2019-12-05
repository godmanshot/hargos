<?php

namespace App\Filters;

use App\Filters\Filter;

class AdviceVideosFilter extends Filter {

    public function advice_category_id($value)
    {
        return $this->builder->where('advice_category_id', $value);
    }
    
    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}