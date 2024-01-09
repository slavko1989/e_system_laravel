<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use DB;
use Carbon\Carbon;
use App\Mail\OrderPlacedMail;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class OrderController extends Controller
{

    public function order(Request $request){


    $user = Auth::user();
    $orders = Order::where('user_id', $user->id)->get();
        
    return view('users/order',compact('orders'));
      
    }

public function add_to_order(Request $request) {
    
    $user = Auth::user();

    
    $cartItems = Cart::where('user_id', $user->id)->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Cart is empty');
    }

    
    foreach ($cartItems as $cartItem) {
        $product = Product::find($cartItem->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        
        $order = new Order;
        $order->user_id = $user->id;
        $order->product_id = $product->id;
        $order->cart_id = $cartItem->id;
        $order->delivery_status = $request->delivery_status;
        $order->payment_status = $request->payment_status;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->street = $request->street;
        $order->status = $request->status;
        $order->order_qty = $cartItem->qty;
        
        $order->save();
        
        if ($order->id) {
            $cartItem->delete();

        Mail::send('emails.order_placed', ['order'=>$order], function($message) use ($user) {
        $message->to($user->email,'bull power it house')->subject('New order');
        });

        }
    }
    
    return redirect('users/order')->with('success', 'Orders placed successfully');
}


public function showOrdersByDate(Request $request,$date) {
     $parsedDate = Carbon::createFromFormat('Y-m-d H:i:s', str_replace('+', ' ', $date));

    $products = Order::whereDate('created_at', '=' , $parsedDate)
        ->with('product')
        ->get();

    return view('users.orders_by_date', compact('products'));
}

public function best_selling(){

    $best_selling = Order::select('product_id')->selectRaw('SUM(order_qty) as total_sold')->groupBy('product_id')->orderByDesc('total_sold')->get();
}


}
