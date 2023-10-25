<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function getUser(){
        $getUser=User::all();
       return view('home.user',compact('getUser'));
    }

    public function getAddUser(){
       
        return view('home.addUser');
    }

    public function addUser(Request $request){
        $validatedUserDetails=$request->validate(
         [
                'fullname'=>'required|Regex:/^[\D]+$/i|max:100',
                'email'=>'required|email|max:255|unique:users',
                'username'=>'required|max:100',
                'phone'=>'required|min:10|Regex:/^\+\d{10,13}$/',
              ],[
                 'fullname.required' => 'Full name is required',
                 'email.required' => 'Email is required', 'email.unique'=>'Email is already taken','email.max'=>'The email is too long',
                 'username.required'=>'Full name is required',
                 'phone.required'=>'Phone is required','phone.min'=>'Phone number length is too small',
              ],
            );
                            
                $user = new User;
                $user->fullname = $validatedUserDetails['fullname'];
                $user->email = $validatedUserDetails['email'];
                $user->username = $validatedUserDetails['username'];
                $user->phone = $validatedUserDetails['phone'];
                $user->save();
                Alert::success('Success','User Added Successfully!');
                return to_route('user');      

    }
}
