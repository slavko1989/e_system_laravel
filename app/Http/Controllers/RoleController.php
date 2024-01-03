<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function create(){

        return view('admin/users.role',

            [
                'role'=>Role::all()
            ]
        );

    }

    public function store(Request $request){

        $role = new Role;
        $role->role_name = $request->role_name;
        $role->save();

        return redirect()->back();

    }

    public function delete($id){
        $delete = Role::where('id',$id)->firstOrFail()->delete();
        return redirect()->back()->with('message','Deleted successfully');
    }

    public function edit($id){
        
        $edit_role = Role::find($id);
        return view('admin/users.edit_role',compact('edit_role'));
    }

    public function update(Request $request, $id){

        $edit_role = Role::find($id);

        $edit_role->role_name = $request->input('role_name');
        $edit_role->update();
        return redirect()->back()->with('message','Product updated successfully'); 
    }
}
