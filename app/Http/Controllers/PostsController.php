<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function read($id)
    {
        $posts = Post::findOrFail($id);
        return view('post')->with('posts',$posts);

        if($firstPostId) {
            $firstPostId = Post::findOrFail($id);
            return view('post')->with('posts',$firstPostId);
        }
    }
}
