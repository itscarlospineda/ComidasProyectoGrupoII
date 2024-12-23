<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Reward;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){

        $posts = Post::orderBy('created_at', 'desc')->first();

        $morePosts = Post::orderBy('created_at', 'desc')->take(4)->get();

        $dishes = Dish::inRandomOrder()->take(6)->get();
        
        $randomDish = Dish::inRandomOrder()->first();

        $reward=DB::table("rewards")
        ->orderBy("Points_needed","ASC")
        ->get();

        session(["reward"=>$reward]);
        return view('index', compact('posts', 'morePosts','dishes', 'randomDish'));
    }
}
