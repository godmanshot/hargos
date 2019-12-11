<?php

namespace App\Filters;

class StockTodayFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}