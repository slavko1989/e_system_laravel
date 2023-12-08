<?php 

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Http\Requests\ProductRequest;


class ProductAttributes{

    public function setProductAttributes(Product $product, ProductRequest $request){

        $product->title = $request->title;
        $product->text = $request->text;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->gender_id = $request->gender_id;
        $product->quantity = $request->quantity;
        //$product->image = $request->image;
    }
}
?>