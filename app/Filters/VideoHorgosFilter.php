<?php

namespace App\Filters;

use App\Filters\Filter;

class VideoHorgosFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}