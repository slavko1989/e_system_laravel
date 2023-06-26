<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['title','text','price','image','new_price','cat_id','brand_id','gender_id','quantity'];
    use HasFactory;
}
