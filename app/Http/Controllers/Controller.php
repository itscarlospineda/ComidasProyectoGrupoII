<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){

        $posts = Post::orderBy('created_at', 'desc')->first();

        $morePosts = Post::orderBy('created_at', 'desc')->take(4)->get();

        return view('index', compact('posts', 'morePosts'));
    }

    public function blog(){
        return view('blog');
    }
}
