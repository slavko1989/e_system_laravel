<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;

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
}
