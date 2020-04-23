<?php

namespace App\Filters;

use App\Filters\Filter;

class PopularBoutiqueFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}