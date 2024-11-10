<?php
namespace App\Http\Controllers;
Use Illuminate\Http\Request;
Use App\Models\Dish;

class ProductController extends Controller
{
    public function viewProduct($dishId)
    {
        $dish= Dish::find($dishId);
        return view("productsample",compact("dish"));
    }
} 

