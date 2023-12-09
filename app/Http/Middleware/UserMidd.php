<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class UserMidd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          if(Auth::check()){
        if(Auth::user()->role_id === '0'){
            return $next($request);
        }
        else{
            return redirect('/')->with('status','Access Denied');
        }
       }
       else{
         return redirect('/login')->with('status','Please login in');
       }
    
    }
}
