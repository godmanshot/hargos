<?php

namespace App\Traits;

trait TranslatesCollection {
    public function translate(&$collection) {
        $collection = $collection->map(function($model) {
            return $model->translate(app()->getLocale());
        });
    }
}