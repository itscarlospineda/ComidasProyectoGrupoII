<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'dish_id',
        'dish_name',
        'dish_price',
        'quantity',
        'dish_total',
        'status',
        'comments',
        'fecha_pedido',
    ];
}
