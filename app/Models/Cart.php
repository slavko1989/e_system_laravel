<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Cart extends Model
{
    protected $fillable=['user_id','product_id','cart_id','qty'];
    use HasFactory;

    public function order_model_cart(){
        return $this->hasMany(Order::class,'cart_id','id');
    }
}
