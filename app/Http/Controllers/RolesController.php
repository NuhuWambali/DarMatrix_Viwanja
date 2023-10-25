<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    //
    public function getRoles(){
        return view('home.roles');
    }

    public function getAddRole(){
        return view('home.addRole');
    }

    public function addrole(Request $request){
        $request->validate([
            'role_name'=>'required|string',
        ]);
        $addrole=new Roles;
        $addrole->role_name=$request->role_name;
        $addrole->save();
        return to_route('getAddRole');
    }

}
