<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Gender;
use App\Models\Cart;
use DB;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
     public function index(){
        
        $cats = category::all();
        $brands = brand::all();
        $genders = gender::all();
        $products = product::paginate(3);
        return view('index',compact('products','cats','brands','genders'));
    }
    public function details($id){
        $details = product::find($id);
        return view('home.details',compact('details'));
    }
    public function search(Request $request){

        $search = $request->input('search');
        $search = product::query()->where('title','LIKE',"%{$search}%")->where('text','LIKE',"%{$search}%")->get();
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
