<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable=['payment_status','delivery_status','user_id','product_id','cart_id'];
    use HasFactory;
}