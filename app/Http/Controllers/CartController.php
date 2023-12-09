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
    

    public function cart(){
       $id = optional(Auth::user())->id;
        $cart = Cart::join('users', 'users.id', '=', 'carts.user_id')
       ->join('products', 'products.id', '=', 'carts.product_id')
       ->select('products.quantity','carts.id','products.price','products.new_price','products.image','carts.product_id','carts.qty')
       ->where('carts.user_id','=',$id)->get();

        return view('users.cart',compact('cart'));
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

                $cart = new Cart;
                $cart->user_id = $user->id;
                $cart->product_id = $product->id;
                $cart->qty = $validatedData['qty'];
                $cart->save();

                
                $product->quantity -= $validatedData['qty'];
                $product->save();
                

                return redirect('users/cart')->with('message','Product added to cart successfully');

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
        
        $delete = Cart::where('id',$id)->firstOrFail();
        $delete->delete();

        return redirect('users/cart')->with('message','Product deleted successfully');

    }
}
