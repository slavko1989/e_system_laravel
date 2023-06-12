<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Validation\Rule;


class BrandController extends Controller
{
    
    public function create(){
        $brand = Brand::all();
        return view('admin/brands.create',compact('brand'));
    }

    public function store(Request $request){
        $request->validate([
            'brand_name'=>'required'
        ]);
        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->save();
        return redirect()->back()->with('message','Brand created successfully');
    }

    public function update(Request $request, $id){
        $edit_brand = Category::find($id);
        $edit_brand->brand_name = $request->input('brand_name');
         $edit_brand->update();
        return redirect()->back()->with('message','Update successfully record'); 
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('admin/categorys.edit',compact('brand'));
    }

    public function delete($id){
        $delete = Brand::where('id',$id)->firstOrFail()->delete();
        return redirect()->back()->with('message','Deleted successfully');
    }



}
