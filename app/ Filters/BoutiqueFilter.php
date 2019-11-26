<?php

namespace App\Filters;

use App\Filters\Filter;

class BoutiqueFilter extends Filter {

    public function category_id($value)
    {
        return $this->builder->where('category_id', $value);
    }

}