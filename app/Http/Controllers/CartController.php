<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CartController extends Controller
{
    

    public function cart()
    {
       $cart = Cart::all();
    return view('users.cart', compact('cart'));
        
    }
  
    public function add_to_cart(Request $request, $id){

        $validatedData = $request->validate([
        'qty' => 'required|numeric|min:1',
    ]);
        
if(Auth::check()){
    $user = Auth::user();
    $product = Product::find($id);

   
    if($product && $user){
        
        if($product->quantity >= $validatedData['qty']){ 

            $existingCartItem = Cart::where('user_id', $user->id)
                                    ->where('product_id', $product->id)
                                    ->first();

            if($existingCartItem) {
                return redirect()->back()->with('error', 'Product already in cart');
            } else {
                
                $cart = new Cart;
                $cart->user_id = $user->id;
                $cart->product_id = $product->id;
                $cart->qty = $validatedData['qty'];
                $cart->save();

                $product->quantity -= $validatedData['qty'];
                $product->save();

                return redirect('users/cart')->with('message','Product added to cart successfully');
            }
        } else {
            return redirect()->back()->with('error', 'Insufficient quantity in stock');
        }
    } else {
        return redirect()->back()->with('error', 'Product or user not found');
    }
} else {
    return redirect('/login')->with('error', 'Please log in to add products to cart');
}
}

    


    public function delete($id){
        
        $cart = Cart::find($id);
        if($cart){
            $productId = $cart->product_id;
            $qty = $cart->qty;
        $cart->delete();

        $product = Product::find($productId);

        if($product){
            $product->quantity += $qty;
            $product->save();
        }
    
        return redirect('users/cart')->with('message','Product deleted successfully');
    }else{
        return redirect('users/cart')->with('error','Cart item not found');

        }
    }
}
