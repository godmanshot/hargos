<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait LoadsAllTranslations {
    public function loadForOne(&$item) {
        $locales = array_diff(config('voyager.multilingual.locales'), [config('voyager.multilingual.default')]);
        $this->translate($item, $locales);
    }

    public function loadForCollection(&$collection) {
        $locales = array_diff(config('voyager.multilingual.locales'), [config('voyager.multilingual.default')]);
        if($collection) {
            $collection = $collection->map(function($model) use($locales) {
                $this->translate($model, $locales);
                return $model;
            });
        }
    }

    private function translate(&$model, $locales) {
        $translations = [];
        $table = $model->getTable();
        
        foreach($locales as $locale) {
            $columns = DB::table('translations')
                ->select(['column_name', 'value'])
                ->where('table_name', $table)
                ->where('foreign_key', $model->id)
                ->where('locale', $locale)
                ->get();
            
            foreach($columns as $column) {
                $translations[$locale][$column->column_name] = $column->value;
            }
        }

        $model->translations = $translations;
        if(count($model->getRelations()) > 0) {
            foreach($model->getRelations() as $relationName => $relation) {
                if($relationName != 'pivot') {
                    if(is_countable($relation)) {
                        $this->loadForCollection($relation);
                    } else {
                        $this->loadForOne($relation);
                    }
                }
            }
        }
    }
}