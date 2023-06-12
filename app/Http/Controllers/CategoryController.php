<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function create(){
        $cat = Category::all();
        return view('admin/categorys.create',compact('cat'));
    }

    public function store(Request $request){
        $request->validate([
            'cat_name'=>'required'
        ]);
        $cat = new Category;
        $cat->cat_name = $request->cat_name;
        $cat->save();
        return redirect()->back()->with('message','Category created successfully');
    }

    public function update(Request $request, $id){
        $edit_category = Category::find($id);
        $edit_category->cat_name = $request->input('cat_name');
         $edit_category->update();
        return redirect()->back()->with('message','Update successfully record'); 
    }

    public function edit($id){
        $cat = Category::find($id);
        return view('admin/categorys.edit',compact('cat'));
    }

    public function delete($id){
        $delete = Category::where('id',$id)->firstOrFail()->delete();
        return redirect()->back()->with('message','Deleted successfully');
    }




}
