<?php

namespace App\Filters;

class CustomerChoiceFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}