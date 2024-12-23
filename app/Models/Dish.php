<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $casts=[  
        "extras" =>"array",
        "price" =>"array"
    ];
    
    protected $fillable = ['name','desc','price','category','picture'];
}
