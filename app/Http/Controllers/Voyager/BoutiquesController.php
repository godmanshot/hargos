<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;

class BoutiquesController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
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
            $this->addProducts($data);
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
            $this->addProducts($data);
            $this->addProductsAll($data);
            event(new BreadDataUpdated($dataType, $data));
            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    public function addWatermark($model, $old_images = [])
    {
        $images = json_decode($model->images ?? '[]', true);

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

    public function addProducts($model)
    {
        $model->products()->delete();
        $products = array_map('trim', explode(';', $model->str_products));
        $products_tmp = [];

        foreach($products as $product) {
            if(empty($product)) {
                continue;
            }
            $products_tmp[] = $model->products()->create(['name' => $product]);
        }

        return $products_tmp;
    }

    public function addProductsAll($model)
    {
        $model->allProducts()->delete();
        $products = array_map('trim', explode(';', $model->str_products_all));
        $products_tmp = [];

        foreach($products as $product) {
            if(empty($product)) {
                continue;
            }
            $products_tmp[] = $model->allProducts()->create(['name' => $product]);
        }

        return $products_tmp;
    }
}
