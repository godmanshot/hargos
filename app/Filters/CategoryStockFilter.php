<?php

namespace App\Filters;

use App\Filters\Filter;

class CategoryStockFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}