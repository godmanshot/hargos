<?php

namespace App\Filters;

use App\Filters\Filter;

class CityFilter extends Filter {

    public function name($value)
    {
        return $this->builder->where('name', 'like', '%'.$value.'%');
    }

    public function country_id($value)
    {
        return $this->builder->where('country_id', $value);
    }

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}