<?php

namespace App\Filters;

use App\Filters\Filter;

class BoutiqueReviewFilter extends Filter {

    public function boutique_id($value)
    {
        return $this->builder->where('boutique_id', $value);
    }

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}