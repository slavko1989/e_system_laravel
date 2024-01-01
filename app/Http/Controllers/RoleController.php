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
}
