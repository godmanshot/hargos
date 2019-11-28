<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Filters\PostsFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(Request $request, PostsFilter $filter)
    {
        $models = Post::latest()->filter($filter);

        return $models->get();
    }
}
