<?php

namespace App\Filters;

class SliderFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}