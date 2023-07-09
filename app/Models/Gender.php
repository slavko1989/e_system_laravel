<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Gender extends Model
{
    protected $fillable =['gender_name'];
    use HasFactory;

    public function product_model_gender(){

            return $this->hasMany(Product::class, 'gender_id', 'id');
    }
}
