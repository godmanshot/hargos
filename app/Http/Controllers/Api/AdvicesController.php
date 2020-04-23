<?php

namespace App\Http\Controllers\Api;

use App\AdvicePost;
use App\AdviceVideo;
use App\AdviceCategory;
use Illuminate\Http\Request;
use App\Filters\AdvicePostsFilter;
use App\Filters\AdviceVideosFilter;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Filters\AdviceCategoriesFilter;

class AdvicesController extends Controller
{
    use LoadsAllTranslations;

    public function categories(Request $request, AdviceCategoriesFilter $filter)
    {
        $model = AdviceCategory::latest()->filter($filter)->get();
        $this->loadForCollection($model);
        
        return $model;
    }

    public function posts(Request $request, AdvicePostsFilter $filter)
    {
        $model = AdvicePost::latest()->filter($filter)->get();
        $this->loadForCollection($model);

        return $model;
    }
    public function videos(Request $request, AdviceVideosFilter $filter)
    {
        $model = AdviceVideo::latest()->filter($filter)->get();
        $this->loadForCollection($model);

        return $model;
    }
}
