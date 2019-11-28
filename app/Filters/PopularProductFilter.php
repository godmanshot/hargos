<?php

namespace App\Filters;

use App\Filters\Filter;

class PopularProductFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}