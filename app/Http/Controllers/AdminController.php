<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;

class AdminController extends Controller
{
    
    public function orders()
    {
        $orders = Orders::join('users', 'orders.username', '=', 'users.username')
        ->select('orders.id', 'users.username', 'orders.dish_name', 'orders.quantity', 'orders.dish_total', 'orders.comments', 'orders.Fecha_pedido', 'orders.status')
        ->where('orders.status','pendiente')
        ->get();
        return view('adminorders', compact('orders'));
       
    }

    public function cancelorder($orderId)
    
    {
        Orders::where('id', $orderId)->update(['status' => 'cancelado']);
        return $this->orders();    
    }

    public function okorder($orderId)
{
    Orders::where('id', $orderId)->update(['status' => 'completado']);
    return $this->orders();
}

public function adminrecord()
{
    $orders = Orders::where('status', '!=', 'pendiente')->get();
    return view("adminordersrecord",compact("orders"));
}

}

