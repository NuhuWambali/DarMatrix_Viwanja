<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        $validatedData=$request->validate([
            'role_name'=>'required|regex:/^[a-zA-Z\s]+$/|min:3',
        ],[
            'role_name.min' => 'The name must be at least three characters long.',
        ]);
        $addrole=new Roles;
        $addrole->role_name=$validatedData['role_name'];
        $addrole->save();
        Alert::success('Success','Role is Added Successfully!');
        return to_route('getAddRole');
    }
  

}
