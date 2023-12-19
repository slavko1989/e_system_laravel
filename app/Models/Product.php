<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Category;
use App\Models\Barnd;
use App\Models\Gender;
use App\Models\Order;
use App\Models\Cart;


class Product extends Model
{
    protected $fillable=['title','text','price','image','new_price','cat_id','brand_id','gender_id','quantity'];
    use HasFactory;


    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
    
      public function cat(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id','id');
    }

 public function order(){
        return $this->hasMany(Order::class,'product_id');
    }
}
