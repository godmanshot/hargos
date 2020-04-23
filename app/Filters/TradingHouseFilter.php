<?php

namespace App\Filters;

class TradingHouseFilter extends Filter {

    public function name($value)
    {
        return $this->builder->where('name', 'like', '%'.$value.'%');
    }

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}