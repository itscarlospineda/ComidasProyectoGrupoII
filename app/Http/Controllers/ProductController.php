<?php
namespace App\Http\Controllers;
Use Illuminate\Http\Request;
Use App\Models\Dish;

class ProductController extends Controller
{
    public function viewProduct($dishId)
        {

           
            $dish = Dish::find($dishId);
          
            $json= json_decode($dish->price,true);
            #$name=$json[0]["name"];
            #DD($json);    

            $prices=array_column($json, "price");
            $min=min($prices);
        
            return view("productsample", compact("dish","json","min"));
        }
        
} 

