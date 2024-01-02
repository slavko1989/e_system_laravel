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

        return view('admin.index',
            [
                'totalUsers' => User::count(),
                'totalProducts' => Product::count(),
                'totalCategory' => Category::count(),
                'totalBrands' => Brand::count(),
                'totalPrice' => Product::sum('price'),
                'users' => User::all()
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

        $status = Order::find($id);
        $status->delivery_status = $request->input('delivery_status');
        $status->update();
        return redirect()->back();
        
    }

    public function update_user_status(Request $request,$id){

        $status = User::findOrFail($id);
        $status->status = $request->input('status');
        $status->save();
        return redirect()->back();
        
    }
}
