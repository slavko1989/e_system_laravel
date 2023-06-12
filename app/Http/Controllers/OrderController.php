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
        $order = order::where('user_id','=',$id)->get();
        
        return view('users/order',compact('order'));
      
    }

      public function add_to_order(Request $request, $id){

        if(Auth::id()){
            $user = Auth::user();
            $product = product::find($id);
            $user_cart = Cart::where('user_id','=',$user->id)->get();

            $order = new order;
            foreach($user_cart as $cart){

            $order->cart_id = $cart->id;
            $order->user_id = $cart->user_id;
            $order->product_id = $cart->product_id;
            $order->payment_status="cash on delivery";
            $order->delivery_status="processing";

            $order->name = $user->name;
            $order->email = $user->email;
            $order->address = $user->address;
            $order->phone = $user->phone;

            $order->image = $product->image;
            $order->title = $product->title;
            $order->text = $product->text;
            $order->price = $product->price;
            $order->new_price = $product->new_price;
            $order->quantity = $cart->quantity;

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
