<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Orders;
use App\Models\Dish;
use App\Models\User;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller

{
 
public function thanks($orderId)
{
    $order = Orders::find($orderId);
    return view("thanks",compact("order"));
    
}

public function payment(Request $request, $dishId)
{
    #dd($dishId);
    $dish = Dish::find($dishId);
    if ($dish->extras  && count($dish->extras)>0)   
        {   
            $validated = $request->validate([
                'extra' => 'required',   
            ]);
            $json=$request->input("extra");
            $decode_json = json_decode($json, true);
            #dd($decode_json); 
            $extra=$decode_json["name"];
            $price=$decode_json["price"];
        }
    else{   
            $price = $request->dish_price;
            $extra = null;
        }


    $request->validate([
        'quantity' => 'numeric|min:1',
    ]);
    #dd($price,$extra);
    $value= round(($request->quantity * $price),2);
    $provider = new PayPalClient;
    $provider->setApiCredentials(config("paypal"));
    $paypal_token=$provider->getAccessToken();
    $response =$provider->createOrder([
        "intent" =>"CAPTURE",
        "application_context"=>[
        "return_url"=>route("success"),
        "cancel_url"=>route("cancel"),
        ],
        "purchase_units"=> [
          [
            "amount"=> [
              "currency_code"=>"USD",
              "value"=> $value
              ]
          ]
        ]
        
    ]);

    #dd($response);    
    if (isset($response["id"]) && $response["id"]!=null)
    {
        foreach($response["links"] as $link)
        {
            if ($link["rel"]==="approve")
            {
                session()->put("dish_id", $request->dish_id);
                session()->put("dish_name", $request->dish_name);
                session()->put("dish_price", $price);
                session()->put("extras", $extra);
                session()->put("quantity", $request->quantity);
                session()->put("comments", $request->comments);
                return redirect()->away($link["href"]);

                
            }


        } 
       
    }else  {
        
        return redirect()->route("cancel");

    }
    

}

public function success(Request $request)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config("paypal"));
    $paypal_token=$provider->getAccessToken();
    $response=$provider->capturePaymentOrder($request->token);
    if (isset($response["status"]) && $response["status"]=="COMPLETED")
    {
        $username= Auth::user()->username;
        $order = new orders();  
        $order->username = $username;
        $order->dish_id =session()->get("dish_id");
        $order->dish_name =session()->get("dish_name");
        $order->extras = session()->get("extras");
        $order->dish_price =session()->get("dish_price");
        $order->quantity =session()->get("quantity");
        $order->dish_total=$response["purchase_units"][0]["payments"]["captures"][0]["amount"]["value"];
        $order->status = 'pendiente';
        $order->comments =session()->get("comments");
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
    
}
}