<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Http\Requests\CatRequest;

class CategoryController extends Controller
{
    public function create(){

        return view('admin/categorys.create',
            [
                'cat' => Category::all()
            ]
        );
    }

    public function store(CatRequest $request){
        
        $cat = new Category;
        $cat->cat_name = $request->cat_name;
        $cat->save();
        return redirect()->back()->with('message','Category created successfully');
    }

    public function update(CatRequest $request, $id){
        $edit_category = Category::find($id);
        $edit_category->cat_name = $request->input('cat_name');
         $edit_category->update();
        return redirect()->back()->with('message','Update successfully record'); 
    }

    public function edit($id){
        
        return view('admin/categorys.edit',
            [
                'cat' => Category::find($id)
            ]
         );
    }

    public function delete($id){
        $delete = Category::where('id',$id)->firstOrFail()->delete();
        return redirect()->back()->with('message','Deleted successfully');
    }




}
