<?php
namespace App\Http\Controllers;
Use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewProduct()
    {
        return view("productsample");
    }
} 