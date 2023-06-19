<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Order;

class AdminController extends Controller
{
    public function index(){

        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalCategory = Category::count();
        $totalBrands = Brand::count();
        $totalPrice = Product::sum('price');

        return view('admin.index',compact('totalUsers','totalProducts','totalCategory','totalBrands','totalPrice'));
    }

    public function all_orders(){
         /*$order = Order::join('products', 'products.id', '=', 'orders.product_id')
       ->join('users', 'users.id', '=', 'orders.user_id')
       ->join('carts', 'carts.id', '=', 'orders.cart_id')
       ->get(['orders.user_id','orders.cart_id','orders.product_id',
        'products.title','products.image','users.address','users.phone','users.name'
            ,'products.price','products.new_price','carts.quantity','orders.payment_status','orders.delivery_status']);*/
          $order = Order::join('products', 'products.id', '=', 'orders.product_id')
          ->join('users', 'users.id', '=', 'orders.user_id')
          ->join('carts', 'carts.id', '=', 'orders.cart_id')
          ->get(['products.title','users.name','carts.quantity']);  
       //$order = order::all();
        return view('admin/orders/all_orders',compact('order'));
    }
}
