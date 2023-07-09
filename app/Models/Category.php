<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $fillable=['cat_name'];
    use HasFactory;

    public function product_model_cat(){

            return $this->hasMany(Product::class, 'cat_id', 'id');
    }
}
