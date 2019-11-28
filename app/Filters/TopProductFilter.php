<?php

namespace App\Filters;

class TopProductFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}