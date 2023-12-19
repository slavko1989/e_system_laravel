<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    protected $fillable=['brand_name'];
    use HasFactory;

    public function product(){

            return $this->hasMany(Product::class, 'brand_id');
    }
}
