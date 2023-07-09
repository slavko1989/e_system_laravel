<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Barnd;
use App\Models\Gender;

class Product extends Model
{
    protected $fillable=['title','text','price','image','new_price','cat_id','brand_id','gender_id','quantity'];
    use HasFactory;

      public function cat_model(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function brand_model(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function gender_model(){
        return $this->belongsTo(Gender::class,'gender_id','id');
    }
}
