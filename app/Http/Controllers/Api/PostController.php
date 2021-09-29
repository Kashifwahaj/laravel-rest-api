<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Cache::remember('posts', 60*60*24, function () {
            return Post::all();
        }));
    }
}
