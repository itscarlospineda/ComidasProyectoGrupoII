<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Post;


class AdminController extends Controller
{
    
    public function orders()
    {
        $orders = Orders::join('users', 'orders.username', '=', 'users.username')
        ->select('orders.id', 'users.username', 'orders.dish_name','orders.Details as espef','orders.quantity', 'orders.dish_total', 'orders.comments', 'orders.Fecha_pedido', 'orders.status')
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

public function dashboard()
{
    $compOrders = Orders::whereIn('status', ['completado', 'cancelado'])->count();
    $actOrders = Orders::where('status', 'pendiente')->count();

    $numDishes = Dish::all()->count();

    $numPosts = Post::all()->count();

    $numUsers = User::where('role', 'user')->count();
    
    return view("adminlanding",compact("compOrders","actOrders","numDishes","numPosts","numUsers"));
}

public function users()
{
    $users= User::where("role","user")->get();
    return view("adminuserlist",compact("users"));
}

public function usersProfile($UserId)

{
    $userdata = User::find($UserId);
    
    $purchases = Orders::join('users', 'orders.username', '=', 'users.username')
    ->select('users.id','orders.id as order_id', 'users.username', 'orders.dish_name', 'orders.dish_price', 'orders.quantity', 'orders.dish_total', 'orders.comments', 'orders.Fecha_pedido', 'orders.status')
    ->where('users.id',$UserId)
    ->get();

    return view("admin_users_profile",compact("purchases","rewards","userdata"));
}



}

