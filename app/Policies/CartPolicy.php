<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

   

    public function view(User $user, Cart $cart){

    //return $user->id === $cart->user_id;

    switch ($user->role_id) {
            case '1':
                return true;
            case '0':
                return $user->id === $cart->user_id;
            default:
                return false;
        }

  }
        


  }  
