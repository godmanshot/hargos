<?php

namespace App\Filters;

class TourHouseFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}