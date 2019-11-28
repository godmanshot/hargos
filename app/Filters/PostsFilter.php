<?php

namespace App\Filters;

class PostsFilter extends Filter {

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}