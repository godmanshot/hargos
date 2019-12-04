<?php

namespace App\Filters;

use App\Filters\Filter;

class CategoryFilter extends Filter {

    public function name($value)
    {
        return $this->builder->where('name', 'like', '%'.$value.'%');
    }

    public function trading_house_id($value)
    {
        return $this->builder->whereHas('boutiques', function ($query) use ($value) {
            $query->whereHas('tradingHouses', function ($trad) use ($value) {
                $trad->where('trading_houses.id', '=', $value);
            });
        });
    }

    public function boutique_id($value)
    {
        return $this->builder->whereHas('boutiques', function ($query) use ($value) {
            $query->where('boutiques.id', '=', $value);
        });
    }

    public function is_popular($value)
    {
        return $this->builder->where('is_popular', $value);
    }

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}