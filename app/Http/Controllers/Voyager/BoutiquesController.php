<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Events\BreadDataAdded;

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

    public function addWatermark($model)
    {
        $images = json_decode($model->images ?? '[]', true);

        foreach($images as $image) {
            $img = Image::make(storage_path('app/public/'.$image));

            $watermark = Image::make(public_path('images/watermark.png'));
            $watermark->resize($img->width()*0.3, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->insert($watermark, 'top-left', 10, 10);

            $img->save(storage_path('app/public/'.$image));

            dd($image);
        }
        dd($images);
    }
}
