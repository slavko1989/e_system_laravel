<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class OrderController extends Controller
{
        public function order(){
       
        $id = Auth::user()->id;
        //$order = order::where('user_id','=',$id)->get();

        $order = Order::join('products', 'products.id', '=', 'orders.product_id')
       ->join('users', 'users.id', '=', 'orders.user_id')
       //->join('carts', 'carts.id', '=', 'orders.cart_id')
       ->select('orders.user_id','orders.product_id',
        'products.title','products.image','users.address','users.phone','users.name'
            ,'products.price','products.new_price','products.quantity','orders.payment_status','orders.delivery_status')
       ->where('orders.user_id','=',$id)->get();
        
        return view('users/order',compact('order'));
      
    }

      public function add_to_order(Request $request, $id){

        if(Auth::id()){
            $id = Auth::user()->id;
            $product = product::find($id);
            $user_cart = Cart::where('user_id','=',$id)->get();

            $order = new order;
            foreach($user_cart as $cart){

            $order->cart_id = $cart->id;
            $order->user_id = $id;
            $order->product_id = $cart->product_id;
            $order->payment_status=$request->payment_status;
            $order->delivery_status=$request->delivery_status;

        
            $order->save();
        

            $del_cart_id = $cart->id;
            $dell_all_from_cart = Cart::where('id',$del_cart_id)->firstOrFail();
            $dell_all_from_cart->delete();        
        }
        return redirect('users/order')->with('message','Product created successfully');
        }else{
            return redirect('users/login');
        }
   }

}
