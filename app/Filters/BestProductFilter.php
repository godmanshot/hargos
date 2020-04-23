<?php

namespace App\Filters;

class BestProductFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}