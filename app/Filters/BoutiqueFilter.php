<?php

namespace App\Filters;

use App\Filters\Filter;

class BoutiqueFilter extends Filter {

    public function name($value) {
        return $this->builder->where('name', 'like', '%'.$value.'%');
    }

    public function seller_name($value) {
        return $this->builder->where('seller_name', 'like', '%'.$value.'%');
    }

    public function owner_name($value) {
        return $this->builder->where('owner_name', 'like', '%'.$value.'%');
    }

    public function languages($value) {
        return $this->builder->where('languages', 'like', '%'.$value.'%');
    }

    public function phone($value) {
        return $this->builder->where('phone', 'like', '%'.$value.'%');
    }

    public function whatsapp($value) {
        return $this->builder->where('whatsapp', 'like', '%'.$value.'%');
    }

    public function weechat($value) {
        return $this->builder->where('weechat', 'like', '%'.$value.'%');
    }

    public function full_description($value) {
        return $this->builder->where('full_description', 'like', '%'.$value.'%');
    }

    public function categories($value)
    {
        return $this->builder->whereHas('categories', function ($query) use ($value) {
            $query->where('categories.id', '=', $value);
        });
    }

    public function trading_house($value)
    {
        return $this->builder->whereHas('tradingHouses', function ($query) use ($value) {
            $query->where('trading_houses.id', '=', $value);
        });
    }

    public function is_hit($value)
    {
        return $this->builder->where('is_hit', $value);
    }

    public function sort($value)
    {
        return $this->builder->orderBy($value);
    }

}