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
    ->select('users.id','orders.id as order_id', 'users.username', 'orders.dish_name', 'orders.dish_price', 'orders.quantity', 'orders.dish_total', 'orders.comments', 'orders.Fecha_pedido', 'orders.status')
    ->where('users.id',$UserId)
    ->get();
    return view('purchases', compact('users'));
    }

    public function rewards()
    {
        $username = Auth::user()->username;
        $rewards=session("reward");
        $points = DB::table("users") 
            ->where("username",$username)
            ->value("points");
        
        return view("rewards",compact("points","rewards"));
       
        }

    public function claimreward($rewardId)
    {
    $rewards = Reward::find($rewardId);
    $username = Auth::user()->username;
    $points = DB::table("users") 
    ->where("username",$username)
    ->value("points");
    return view("claimrewards",compact("points","rewards"));   
    }
    
    public function savereward(Request $request, Rewards_claimed $claimreward, $rewardId)
    {
        $username = Auth::user()->username;
        $points = (int) DB::table("users") 
        ->where("username",$username)
        ->value("points");
        $points_needed =(int) DB::table("rewards")
        ->where("id",$rewardId)
        ->value("Points_needed");
    
        if ($points >= $points_needed)
        
        {
            try {
            DB::beginTransaction();
            $claimreward = new Rewards_claimed();
            $claimreward ->RewardId = $request->input("RewardId");
            $claimreward ->Name = $request->Name;
            $claimreward ->username = $username;
            $claimreward ->Points_needed = $request->Points_needed;
            $claimreward ->save();
            $claimId = $claimreward->id;

            $updated = User::where("username", $username)
            ->decrement("points", $points_needed);
             if (!$updated) {
            DB::rollback();
            return response()->json(['message' => 'Error al actualizar los puntos.'], 500);
        }
            DB::commit();
            return response()->json(['message' => 'Reward claimed successfully!'], 200);
        }
        catch(Exception)
        {
        DB::rollback();

        }
    }
        
    }

        

}