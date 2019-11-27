<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class Filter extends Model {

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($query, $params = [])
    {
        $this->builder = $query;
        $this->params = $params;

        foreach($this->getFilters() as $key => $value) {
            if(method_exists($this, $key)) {
                $this->$key($value);
            }
        }

        return $this->builder;
    }
    
    public function getFilters()
    {

        $filters = array_merge($this->request->all(), $this->params);

        return array_filter($filters);
    }
}