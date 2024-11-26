<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Orders;
use App\Models\User;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller

{
    public function newOrder(Request $request, Orders $orders)
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
    $orderId = $order->id;

    if ($order->dish_total >= 300 &&  $order->dish_total<500)
    {
            $points = 5;
    }else 
    {
        $points=0;
    }
    
    if ($order->dish_total >= 500 &&  $order->dish_total<800)
    {
            $points = 10;
    }  

    if ($order->dish_total >= 800 )
    {
            $points = 20;
    }
    User::where("username", $username)->increment("points",$points);

    return redirect()->route('thanks',['orderId'=>$orderId]);
}
public function thanks($orderId)
{
    $order = Orders::find($orderId);
    return view("thanks",compact("order"));
    
}

public function payment(Request $request)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config("paypal"));
    $paypal_token=$provider->getAccessToken();
    $order = $provider->createOrder($data);
    $provider->createOrder([
        "intent" =>"CAPTURE",
        "purchase_units"=> [
          [
            "amount"=> [
              "currency_code"=>"USD",
              "value"=> $request->quantity * $request->dish_price
              ]
          ]
        ]
        
    ]);
        

}



}