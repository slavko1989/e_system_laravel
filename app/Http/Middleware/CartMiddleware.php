<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (Auth::check()) {
        $user = Auth::user();
        if ($user) {
            $cart = Cart::where('user_id', $user->id)->first();

            if (!$cart || $cart->user_id !== $user->id) {
                
                return redirect('/')->with('status', 'Unauthorized access to cart');
            }
        } else {
            
            return redirect('/')->with('status', 'User not found');
        }
    } else {
        
        return redirect('/')->with('status', 'User not logged in');
    }

    return $next($request);
}

}
