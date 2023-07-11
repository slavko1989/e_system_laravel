<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;



class Order extends Model
{
    protected $fillable=['payment_status','delivery_status','user_id','product_id','cart_id'];
    use HasFactory;

public function cart_model_order(){
    return $this->belongsTo(Cart::class,'cart_id','id');
}

public function user_model_order(){
    return $this->belongsTo(User::class,'user_id','id');
}

   public function product_model_order(){
    return $this->belongsTo(Product::class,'product_id','id');
}



}