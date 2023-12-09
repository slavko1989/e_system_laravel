<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Gender;
use Illuminate\Validation\Rule;
use DB;
use App\Http\Requests\ProductRequest;
use App\Services\ProductAttributes;
use App\Services\FileUploadService;


class ProductController extends Controller
{
    
    public function create(){

       $product = Product::join('categories', 'categories.id', '=', 'products.cat_id')
       ->join('brands', 'brands.id', '=', 'products.brand_id')
       ->join('genders', 'genders.id', '=', 'products.gender_id')
       ->get(['products.title','products.id','products.quantity',
        'products.text',
        'products.image',
        'products.price',
        'products.new_price',
        'categories.cat_name',
        'brands.brand_name',
        'genders.gender_name']);

        $cats = category::all();
        $brands = brand::all();
        $genders = gender::all();
        return view('admin/products.create',compact('product','cats','brands','genders'));
    }

    public function store(ProductRequest $request,ProductAttributes $attr,FileUploadService $upload){
      
        $product = new Product;
       
        $attr->setProductAttributes($product,$request);
        $upload->uploadFile($request, $product); 
        $product->save();
        return redirect()->back()->with('message','Product created successfully');
    }

    public function update(Request $request, $id){
        $edit_product = Product::find($id);

        $image = $request->image;
        if($image){
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imgname);
        $edit_product->image=$imgname;
        }

        $edit_product->title = $request->input('title');
        $edit_product->text = $request->input('text');
        $edit_product->price = $request->input('price');
        $edit_product->new_price = $request->input('new_price');
        $edit_product->cat_id = $request->input('cat_id');
        $edit_product->brand_id = $request->input('brand_id');
        $edit_product->gender_id = $request->input('gender_id');
        $edit_product->quantity = $request->input('quantity');
        $edit_product->update();
        return redirect()->back()->with('message','Product updated successfully'); 
    }

    public function edit($id){
        $cat = category::all();
        $brand = brand::all();
        $gender = gender::all();
        $edit_product = product::find($id);
        return view('admin/products.edit',compact('edit_product','cat','gender','brand'));
    }

    public function delete($id){
        $delete = Product::where('id',$id)->firstOrFail()->delete();
        return redirect()->back()->with('message','Deleted successfully');
    }
}
