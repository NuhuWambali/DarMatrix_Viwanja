<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function createLogin(Request $request){
      $validatedData=$request->validate(
            [  
                'email'=>'required|email',
                'password'=>'required',
              ],[
                 'email.required' => 'Email is required',
                 'password.required' => 'Password is required',
              ],
    );
        if(Auth::attempt($validatedData)){
            Alert::success('Loggedin Successfully','Welcome to DarMatrix Viwanja');
            return to_route('index');
        }
        return redirect('/')->with('message','Wrong Email or Password');
    }

    
    public function logout(){
        session::flush();
        Auth::logout();
        return redirect('/');
    }

}
