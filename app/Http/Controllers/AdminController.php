<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Order;
use App\Models\Newsletter;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index',
            [
                'totalUsers' => User::count(),
                'totalProducts' => Product::count(),
                'totalCategory' => Category::count(),
                'totalBrands' => Brand::count(),
                'totalPrice' => Product::sum('price'),
                'users' => User::all(),
                'totalOrders' => Order::count(),
                'total_news'=>Newsletter::count(),
                'total_comments'=>Comment::count()
            ]
        );
    }

    public function all_orders(){
    
        return view('admin/orders/all_orders',
            [
                'order' => Order::all()
            ]
    );
    }

       public function all_users(){
            $users = User::all();
        return view('admin/users/all_users',

            [
                'users' => User::all()
            ]
        );
    }

    public function order_status(Request $request,$id){

        $status = Order::findOrFail($id);
        $status->status = $request->input('status');
        $status->save();
        return redirect()->back();
        
    }

    public function update_user_status(Request $request,$id){

        $status = User::findOrFail($id);
        $status->status = $request->input('status');
        $status->save();
        return redirect()->back();
        
    }
}
