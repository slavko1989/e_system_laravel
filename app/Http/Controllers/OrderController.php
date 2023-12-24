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
       

       $order = Order::all();
       return view('users/order',compact('order'));
      
    }

public function add_to_order(Request $request) {
    // Pronalaženje trenutno prijavljenog korisnika
    $user = Auth::user();

    // Pronalaženje korpe za prijavljenog korisnika
    $cartItems = Cart::where('user_id', $user->id)->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Cart is empty');
    }

    // Iteriranje kroz sve stavke u korpi i pravljenje narudžbi za svaku stavku
    foreach ($cartItems as $cartItem) {
        $product = Product::find($cartItem->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Kreiranje nove narudžbe za svaku stavku u korpi
        $order = new Order;
        $order->user_id = $user->id;
        $order->product_id = $product->id; // Postavi odgovarajući product_id za narudžbu
        $order->cart_id = $cartItem->id;
        $order->delivery_status = $request->delivery_status;
        $order->payment_status = $request->payment_status;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->street = $request->street;
        $order->status = $request->status;
        $order->order_qty = $cartItem->qty;

        // Sačuvaj narudžbu
        $order->save();

        // Ako je narudžba uspešno sačuvana, izbriši proizvod iz korpe
        if ($order->id) {
            $cartItem->delete();
        }
    }

    // Preusmeri nazad na prethodnu stranicu sa odgovarajućom porukom
    return redirect()->back()->with('success', 'Orders placed successfully');
}




}
