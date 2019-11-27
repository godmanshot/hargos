<?php

namespace App;

use App\Filters\Filter;

trait CanFilterTrait {

    public function scopeFilter($query, Filter $filter, $params = [])
    {
        return $filter->apply($query, $params);
    }

}