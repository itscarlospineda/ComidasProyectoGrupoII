<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Reward;
use App\Models\Rewards_claimed;
use Illuminate\Support\Facades\DB;


class RewardController extends Controller
{
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
    
    public function savereward(Request $request, Rewards_claimed $claimreward)
    {

        
        $RewardId = $request->input("RewardId");
        $username = Auth::user()->username;
        $points = DB::table("users") 
        ->where("username",$username)
        ->value("points");
        $points_needed =DB::table("rewards")
        ->where("id",$RewardId)
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
            User::where('username', $username)->update(['Points' => $points - $points_needed]);
            DB::commit();
            }
        catch(\Exception)
        {
        DB::rollback();

        } return redirect()->route('thanksReward',['claimId'=>$claimId]);      
    } else  {

        return response()->json("ERROR");

    }
    }

    public function thanksReward($claimId)
    {
        $claimreward = Rewards_claimed::find($claimId);
        return view("thanksRewards", compact("claimreward"));

    }
        

}