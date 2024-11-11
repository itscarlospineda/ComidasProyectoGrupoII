<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function newOrder(Request $request)
{
    $username= Auth::user()->username;
    $request->validate([
        'quantity' => 'numeric|min:1', 
        
    ]);
    $order = new orders();
    $order->username = $username;
    $order->dish_id = $request->input('dish_id');
    $order->dish_name = $request->dish_name;
    $order->dish_price = $request->dish_price;
    $order->quantity = $request->quantity;
    $order->dish_total = $request->quantity * $request->dish_price;
    $order->status = 'pendiente';
    $order->comments = $request->comments;
    $order->fecha_pedido = now(); 
    $order->save();
    return redirect('/index');
}
}