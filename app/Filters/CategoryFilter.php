<?php

namespace App\Filters;

use App\Filters\Filter;

class CategoryFilter extends Filter {

    public function name($value)
    {
        return $this->builder->where('name', 'like', '%'.$value.'%');
    }

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}