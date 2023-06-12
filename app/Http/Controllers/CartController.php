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
       $id = Auth::user()->id;
        $cart = Cart::join('users', 'users.id', '=', 'carts.user_id')
       ->join('products', 'products.id', '=', 'carts.product_id')
       ->select('carts.quantity','carts.id','products.price','products.new_price','products.image','carts.product_id')
       ->where('carts.user_id','=',$id)->get();

        return view('users.cart',compact('cart'));
    }
    public function add_to_cart(Request $request, $id){

        if(Auth::id()){
            $user = Auth::user();
            $product = product::find($id);
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
        return redirect('users/cart')->with('message','Product created successfully');
        }else{
            return redirect('users/login');
        }
    }
    public function delete($id){
        
        $delete = Cart::where('id',$id)->firstOrFail();
        $delete->delete();

        return redirect('users/cart')->with('message','Product deleted successfully');

    }
}
