<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Gender;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use DB;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
     public function index(){
        
        return view('index',([
            'products'=>product::paginate(8),
            'cats'=>category::all(),
            'brands'=>brand::all(),
            'genders'=>gender::all(),
            'best_selling'=>Order::select('product_id')->selectRaw('SUM(order_qty) as total_sold')->groupBy('product_id')->orderByDesc('total_sold')->get()

        ]));



    }
    public function details($id){
        $details = product::with('comments')->find($id);
       // $comm = Comment::all();
        return view('home.details',compact('details'));
    }
    public function search(Request $request){

        $searchTerm = $request->input('search');
        $search = product::query()->where('title','LIKE',"%{$searchTerm}%")->orWhere('text','LIKE',"%{$searchTerm}%")->orderBy('created_at','desc')->get();
        return view('home.search', compact('search'));
    }
     public function show_by_cat($id){
        $catDetails = Category::where('id',$id)->first();
        return view('home.show_by_cat',compact('catDetails'));
    }

   
    public function show_by_brand($id){
        $brandDetails = Brand::where('id',$id)->first();
        return view('home.show_by_brands',compact('brandDetails'));
    }
    public function show_by_gender($id){
        $genderDetails = Gender::where('id',$id)->first();
        return view('home.show_by_genders',compact('genderDetails'));
    }

}
