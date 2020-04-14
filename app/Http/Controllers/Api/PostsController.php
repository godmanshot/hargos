<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Filters\PostsFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\LoadsAllTranslations;
use App\Traits\TranslatesCollection;

class PostsController extends Controller
{
    use LoadsAllTranslations;

    public function index(Request $request, PostsFilter $filter)
    {
        $models = Post::latest()->filter($filter)->get();
        $this->loadForCollection($models);

        return $models;
    }
}
