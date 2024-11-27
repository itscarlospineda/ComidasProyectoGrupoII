<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

    
    public function view()
    {
        $posts = Post::all();
        return view('posts/postView', compact('posts'));
    }
    
    public function create()
    {
        return view('posts/postCreate'); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'content2' => 'nullable|string',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'picture1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['upload_date'] = now();

        if ($request->hasFile('picture1')) {
            $data['picture1'] = $request->file('picture1')->store('posts', 'public');
        }

        if ($request->hasFile('picture2')) {
            $data['picture2'] = $request->file('picture2')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('posts.view')->with('success', 'Post creado exitosamente.');
    }

    
    
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.postEdit', compact('post')); 
    }

    
    public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);
    
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'content2' => 'nullable|string',
        'author' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'picture1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'picture2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('picture1')) {
        if ($post->picture1) {
            Storage::disk('public')->delete($post->picture1);
        }
        $data['picture1'] = $request->file('picture1')->store('posts', 'public');
    }

    if ($request->hasFile('picture2')) {
        if ($post->picture2) {
            Storage::disk('public')->delete($post->picture2);
        }
        $data['picture2'] = $request->file('picture2')->store('posts', 'public');
    }

    $post->update($data);

    return redirect()->route('posts.view')->with('success', 'Post actualizado exitosamente.');
}

    
    //Desrtoy

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
