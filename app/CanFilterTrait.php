<?php

namespace App;

use App\Filters\Filter;

trait CanFilterTrait {

    public function scopeFilter($query, Filter $filter)
    {
        return $filter->apply($query);
    }

}