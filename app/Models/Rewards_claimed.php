<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rewards_claimed extends Model
{
    use HasFactory;
    protected $fillable = ['RewardId',"Name",'username','Points_needed'];
}
