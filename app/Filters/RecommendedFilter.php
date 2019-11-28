<?php

namespace App\Filters;

class RecommendedFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}