<?php
namespace App\Http\Controllers;
Use Illuminate\Http\Request;
Use App\Models\Dish;

class ProductController extends Controller
{
    public function viewProduct($dishId)
        {
            $dish = Dish::find($dishId);   
            if ($dish)
            {
                $price=$dish->price;
                $dPrice=json_decode($price);

                if (json_last_error() === JSON_ERROR_NONE && is_array($dPrice))
                {    
                    $min=min(array_column($dPrice, "price"));
                    $price=$dPrice;
                }else 
                {
                     $min=null;                  
                }
            }   
            return view("productsample", compact("dish","price","min"));
        }
        
} 

