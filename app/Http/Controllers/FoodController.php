<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class FoodController extends Controller
{
    
    public function foods()
    {
        $dishes=Dish::all();
        return view("food",compact("dishes"));
    }
}