<?php

namespace App\Http\Controllers\Voyager;

use App\Translation;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use App\Traits\ChangesImageQuality;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;

class BoutiquesController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    use ChangesImageQuality;
    public function store(Request $request) {
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        // Check permission
        $this->authorize('add', app($dataType->model_name));
        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);
        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }
        if (!$request->has('_validate')) {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
            $this->addWatermark($data);
            $this->addProducts($data, $request->str_products_i18n);
            $this->addProductsAll($data);
            event(new BreadDataAdded($dataType, $data));
            if ($request->ajax()) {
                return response()->json(['success' => true, 'data' => $data]);
            }
            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                        'message'    => __('voyager::generic.successfully_added_new')." {$dataType->display_name_singular}",
                        'alert-type' => 'success',
                    ]);
        }
    }

    public function update(Request $request, $id)
    {
        $str_products_i18n = json_decode($request->str_products_i18n, true);
        $str_products_all_i18n = json_decode($request->str_products_all_i18n, true);
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;
        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
        // Check permission
        $this->authorize('edit', $data);
        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id);
        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }
        if (!$request->ajax()) {
            $old_images = json_decode($data->images ?? '[]', true);
            $this->insertUpdateData($request, $slug, $dataType->editRows, $data);
            $this->addWatermark($data, $old_images);
            $this->changeImagesQuality($data, $old_images);
            $this->addProducts($data, $str_products_i18n);
            $this->addProductsAll($data, $str_products_all_i18n);
            event(new BreadDataUpdated($dataType, $data));
            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    public function changeImagesQuality($model, $old_images = []) {
        $images = json_decode($model->images ?? '[]', true);
        $qualities = [
            '4g' => env('IMAGE_QUALITY_4G'),
            '3g' => env('IMAGE_QUALITY_3G'),
            '2g' => env('IMAGE_QUALITY_2G')
        ];
        foreach($images as $image) {
            if(in_array($image, $old_images))
                continue;
            $this->changeQuality($image, $qualities);
        }
    }

    public function addWatermark($model, $old_images = [])
    {
        $images = json_decode($model->images ?? '[]', true);
        $old_images = $old_images ?: [];
        foreach($images as $image) {
            if(in_array($image, $old_images))
                continue;
            $img = Image::make(storage_path('app/public/'.$image));

            $x = 0;

            while ($x < $img->width()) {
                $y = 0;

                while($y < $img->height()) {
                    $font_size = $img->width() * 0.05;

                    $img->text(env('APP_NAME'), $x, $y, function($font) use ($font_size) {
                        $font->file(public_path('fonts/Montserrat-Regular.ttf'));
                        $font->size($font_size);
                        $font->color(array(255, 255, 255, 0.2));
                        $font->align('center');
                        $font->valign('top');
                        $font->angle(45);
                    });


                    $y += $font_size*5;
                }

                $x += $font_size*5;
            }

            $img->save(storage_path('app/public/'.$image));
        }
    }

    public function addProducts($model, $fields)
    {
        $products = array_map(function($field) {
            return array_map('trim', explode(';', $field));
        }, $fields);
        $defaultLocaleProducts = $products[Translation::getDefaultLocale()];
        unset($products[Translation::getDefaultLocale()]);
        $model->products()->delete();
        $products_tmp = [];

        foreach($defaultLocaleProducts as $index => $product) {
            if(empty($product)) {
                continue;
            }
            $prod = array_map('trim', explode('-', $product));
            $prices = isset($prod[1]) ? array_map('trim', explode(',', $prod[1])) : [0, 0];
            $name = $prod[0];
            $price_from = $prices[0];
            $price_to = $prices[1];
            $tmp = $model->products()->create(['name' => $name, 'price_from' => $price_from, 'price_to' => $price_to]);
            $foreignKey = $tmp->id;
            $products_tmp[] = $tmp;

            foreach(Translation::getLocales() as $locale) {
                $localeProduct = array_map('trim', explode('-', $products[$locale][$index]));
                $localeName = $localeProduct[0];
                Translation::create([
                    'table_name' => 'boutique_products',
                    'column_name' => 'name',
                    'foreign_key' => $foreignKey,
                    'locale' => $locale,
                    'value' => $localeName
                ]);
            }
        }

        return $products_tmp;
    }

    public function addProductsAll($model, $fields)
    {
        $products = array_map(function($field) {
            return array_map('trim', explode(';', $field));
        }, $fields);
        $defaultLocaleProducts = $products[Translation::getDefaultLocale()];
        unset($products[Translation::getDefaultLocale()]);
        
        $model->allProducts()->delete();
        $products_tmp = [];
        
        foreach($defaultLocaleProducts as $index => $product) {
            if(empty($product)) {
                continue;
            }
            $tmp = $model->allProducts()->create(['name' => $product]);
            $foreignKey = $tmp->id;
            $products_tmp[] = $tmp;
            foreach(Translation::getLocales() as $locale) {
                Translation::create([
                    'table_name' => 'all_products',
                    'column_name' => 'name',
                    'foreign_key' => $foreignKey,
                    'locale' => $locale,
                    'value' => $products[$locale][$index]
                ]);
            }
        }

        return $products_tmp;
    }
}
