<?php 

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Requests\CartRequest;
use Auth;

class CartServices
{

    public function checkAuthentication(){

        if(!Auth::check()){
             return redirect('/login')->with('error', 'Please log in to add products to cart');
        }
    }

    public function findByProductId($productId){

        return Product::find($productId);
    }

    public function validateProductAndUser($product,$user){

        if(!$product || !$user){

            return redirect()->back()->with('error', 'Product or user not found');

        }
    }

    public function checkProductQuantity($product,$requestedQty){

        if($product->quantity < $requestedQty){

            return redirect()->back()->with('error', 'Insufficient quantity in stock');
        }
    }


    public function addToCart($user, $product, $requestedQty)

    {
        $existingCartItem = Cart::where('user_id', $user->id)
                                ->where('product_id', $product->id)
                                ->first();

        if ($existingCartItem) {
            return redirect()->back()->with('error', 'Product already in cart');
        } else {
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->qty = $requestedQty;
            $cart->save();

            $product->quantity -= $requestedQty;
            $product->save();

            return redirect('users/cart')->with('message', 'Product added to cart successfully');
        }
    }

}