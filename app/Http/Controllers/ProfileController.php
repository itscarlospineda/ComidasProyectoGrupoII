<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Reward;
use App\Models\Rewards_claimed;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     protected function create(array $data)
     {
         $user = User::create([
             'username' => $data['username'],
             'fname' => $data['fname'],
             'lname' => $data['lname'],
             'email' => $data['email'],
             'password' => Hash::make($data['password']),
             'phone_num' => $data['phone_num'],
             'address' => $data['address'],
             'points' => $data['points'],
             'profile_picture' => 'profile_pictures/default-profile.png', 
             'role' => $data['role'],
         ]);
         Auth::login($user);

         Session::put("username",Auth::user()->username); 
     }

     public function edit()
    {
        $user = Auth::user();
        return view('userprofile')->with('user',$user);
    }


     public function uploadProfilePicture(Request $request, $id) 
     {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the authenticated user
        $user = User::findOrFail($id); // Make sure to find the user based on the provided ID

        // Create a hashed filename
        $originalName = $request->file('profile_picture')->getClientOriginalName();
        $hashedName = md5(time() . $originalName) . '.' . $request->file('profile_picture')->getClientOriginalExtension();


        // Store the file using the hashed filename
        $path = $request->file('profile_picture')->storeAs('profile_pictures', $hashedName, 'public');

        // Save the hashed filename to the database
        $user->profile_picture = $hashedName; // Save the hashed filename
        $user->save();

        return response()->json(['message' => 'Foto de perfil actualizado correctamente. Será redirigido a la página principal.', 'path' => $hashedName]);
        /*return redirect()->route('index');*/
    }

    public function purchases($UserId)
    {
        $users = Orders::join('users', 'orders.username', '=', 'users.username')
    ->select('users.id','orders.id as order_id', 'orders.Details as espef','users.username', 'orders.dish_name', 'orders.dish_price', 'orders.quantity', 'orders.dish_total', 'orders.comments', 'orders.Fecha_pedido', 'orders.status')
    ->where('users.id',$UserId)
    ->get();
    return view('purchases', compact('users'));
    }

    public function updateProfile($id , Request $request)
    {
        
        #dd($id);
        $request ->validate([
            "fname" => "required|string|min:3",
            "lname" => "required|string|min:3",
            "phone_num" => "required|numeric|digits:8",
            "address" => "required|string|min:5",
        ]);
        User::where("id",$id)
        ->update([
        "fname"=> $request->fname,
        "lname"=>$request->lname,
        "email"=>$request->email,
        "phone_num"=>$request->phone_num,
        "address"=>$request->address,
        ]);
        return redirect()->route('settings');
    }
    


}