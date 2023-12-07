<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Role;

class IsAdmin
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
        $user = Auth::user();

        if($user->role_id === 1){
            return $next($request);
            return redirect('admin/index')->with('status','Welcome Admin');
        } else {
            return redirect('/')->with('status','Access Denied');
        }
    } else {
        return redirect('/login')->with('status','Please login in');
    }
}
}
