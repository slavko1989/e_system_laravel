<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{

    public function reg(){
        return view('users.register');
    }

    public function log(){
        return view('users.login');
    }

    public function store(Request $request){


          $formValid = $request->validate([

            'name'=>['required','min:3'],
            'email'=>['required',Rule::unique('users','email')],
            'password'=>'required|min:6',
            'confirm_pass'=>'required|same:password',
            'address'=>'required',
            'phone'=>'required',
            'profile'=>'required|mimes:jpg,png,gif,jpeg,svg'
        ]);
        $image = $request->profile;
        if($image){
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->profile->move('users_img',$imgname);
        $formValid['profile']=$imgname;
        }
         $formValid['password'] = bcrypt($formValid['password']);

         $user = User::create($formValid);

         auth()->login($user);
         return redirect()->back()->with('message','User created, now you can login');

    }
     public function logout(Request $request){

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','You are logout');
    }

   

    public function authenticate(Request $request){
        $loginValid = $request->validate([
            'email'=>'required','email',
            'password'=>'required'
        ]);

           if(auth()->attempt($loginValid)){
            if(auth::user()->type=='1'){
            $request->session()->regenerate();
            return redirect('admin/index')->with('message','You now logged in');
            }elseif(auth::user()->type=='0'){
            $request->session()->regenerate();
            return redirect('/')->with('message','You now logged in');
            } 
        }

        
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }


}