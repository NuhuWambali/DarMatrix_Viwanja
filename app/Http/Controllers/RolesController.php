<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{
    //
    public function getRoles(){
        $getRoles=Roles::all();
        return view('home.roles',compact('getRoles'));
    }

    public function getAddRole(){
        return view('home.addRole');
    }

    public function addrole(Request $request){
        $validatedRoleName=$request->validate([
            'role_name'=>'required|regex:/^[a-zA-Z\s]+$/|min:3',
        ],[
            'role_name.min' => 'The role name must be at least three characters long.',
        ]);
        $addrole=new Roles;
        $addrole->role_name=$validatedRoleName['role_name'];
        if (Roles::where('role_name', $addrole->role_name)->exists()) {
            return redirect()->back()->withErrors(['role_name' => 'The role name already exists in the database.'])->withInput();
        }
        $addrole->save();
        Alert::success('Success','Role Added Successfully!');
            return to_route('roles');
    }


    public function deleteRole(Request $request,$id){
        $deleteRole=Roles::findOrFail($id);
        $deleteRole->delete();
        Alert::success('Success','Role Deleted Successfully!');
        return to_route('roles');

    }
}
