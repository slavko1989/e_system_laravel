<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;
use Illuminate\Validation\Rule;


class GenderController extends Controller
{
    
    public function create(){
        $gender = gender::all();
        return view('admin/genders.create',compact('gender'));
    }

    public function store(Request $request){
        $request->validate([
            'gender_name'=>'required'
        ]);
        $gender = new Gender;
        $gender->gender_name = $request->gender_name;
        $gender->save();
        return redirect()->back()->with('message','gender created successfully');
    }

    public function update(Request $request, $id){
        $edit_gender = gender::find($id);
        $edit_gender->gender_name = $request->input('gender_name');
         $edit_gender->update();
        return redirect()->back()->with('message','Update successfully record'); 
    }

    public function edit($id){
        $gender = gender::find($id);
        return view('admin/genders.edit',compact('gender'));
    }

    public function delete($id){
        $delete = gender::where('id',$id)->firstOrFail()->delete();
        return redirect()->back()->with('message','Deleted successfully');
    }



}
