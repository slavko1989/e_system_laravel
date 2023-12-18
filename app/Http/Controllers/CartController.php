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
use App\Services\CartServices;
use App\Http\Requests\CartRequest;
use App\Policies\CartPolicy;

class CartController extends Controller
{
    

    public function cart(CartServices $cart_service)
    {

    $user = Auth::user();
    $userCart = $cart_service->getUserCart($user->id);
    return view('users.cart')->with('userCart', $userCart);
       
    }
  
    public function add_to_cart(CartRequest $request,CartServices $cart_service, $id){


        $cart_service->checkAuthentication();
        $user = Auth::user();
        $product = $cart_service->findByProductId($id);

        $cart_service->validateProductAndUser($product,$user);

        if($product->quantity >= $request->qty){

            $cart_service->checkProductQuantity($product,$request->qty);
            $cart_service->addToCart($user, $product, $request->qty);
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
