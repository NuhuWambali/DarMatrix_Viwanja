<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\{User,Roles};
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class UserController extends Controller
{
    //
    public function getUser(){
        $getUser=User::all();
       return view('home.user',compact('getUser'));
    }

    public function getAddUser(Roles $roles){
        $roles=Roles::all();
        return view('home.userAdd',compact('roles'));
    }

    public function addUser(Request $request){
        $validatedUserDetails=$request->validate(
         [
                'fullname'=>'required|Regex:/^[\D]+$/i|max:200',
                'email'=>'required|email|unique:users',
                'username'=>'required|max:100',
                'role_id'=>'required',
                'phone'=>'required|min:10',
              ],
              [
                 'fullname.required' => 'Full name is required',
                 'email.required' => 'Email is required', 'email.unique'=>'Email is already taken',
                 'username.required'=>'Full name is required',
                 'role.required'=>'Role is required',
                 'phone.required'=>'Phone is required','phone.min'=>'Phone number length is too small',
              ],
            );
                $user = new User;
                $user->fullname = $validatedUserDetails['fullname'];
                $user->email = $validatedUserDetails['email'];
                $user->username = $validatedUserDetails['username'];
                $user->role_id = $validatedUserDetails['role_id'];
                $user->phone = $validatedUserDetails['phone'];
                $randomPassword = Str::random(12);
                $username=$user->username;
                $user->password = bcrypt($randomPassword);
                $email=$validatedUserDetails['email'];
                $user->save();
                Alert::success('Success','User Added Successfully!, Password is Sent to User Email');
                $user->sendPasswordNotification($username,$email,$randomPassword);
                return to_route('user');
    }

    public function editUserPage($id){
        $user=User::findOrFail($id);
        $roles=Roles::all();
        return view('home.userEdit',compact('user','roles'));
    }

    public function editUser(Request $request, $id){
        $editUser=User::findOrFail($id);
        $validatedUserdata=$request->validate(
            [
                   'fullname'=>'required|Regex:/^[\D]+$/i|max:100',
                   'email'=>'required|email',
                   'username'=>'required|max:100',
                   'role_id'=>'',
                   'phone'=>'required|min:10',
                 ],[
                    'fullname.required' => 'Full name is required',
                    'email.required' => 'Email is required',
                    'username.required'=>'Full name is required',
                    'role.required'=>'Role is required',
                    'phone.required'=>'Phone is required','phone.min'=>'Phone number length is too small',
                 ],
               );
               $editUser->update($validatedUserdata);
               Alert::success('Success','User Updated Successfully! ');
               return to_route('user');
    }

    public function activateUser($id){
        $activateUser=User::findOrFail($id);
        $activateUser->status="Active";
        $activateUser->save();
        Alert::success('Success','User actiavated Successfully! ');
        return to_route('user');
    }

    public function deactivateUser($id){
        $deactivateUser=User::findOrFail($id);
        $deactivateUser->status="inActive";
        $deactivateUser->save();
        Alert::success('Success','User Deactiavated Successfully! ');
        return to_route('user');
    }

    public function userDetails($id){
        $userDetails=User::findOrFail($id);
        return view('home.userDetails',compact('userDetails'));
    }

    public function resendPassword($id){
        $user=User::findOrFail($id);
        $username=$user->username;
        $userEmail=$user->email;
        $randomPassword = Str::random(12);
        $user->password = bcrypt($randomPassword);
        $user->save();
        Alert::success('Success','Password Resend Successfully!');
        $user->ResendPasswordNotification($username,$userEmail,$randomPassword);
        return to_route('user');
    }

    public function Profile($id){
        $userInformations=User::findOrFail($id);
        $roles=Roles::all();
        $roleName = $userInformations->roles->role_name;
        $roleName = $userInformations->roles->role_name;
        return view('home.userProfile',compact('userInformations','roleName','roles'));
    }

    public function updateProfile(Request $request,$id){
        $userData=User::findOrFail($id);
        $validatedUserData=$request->validate(
            [
                   'fullname'=>'required|Regex:/^[\D]+$/i|max:100',
                   'email'=>'required|email',
                   'username'=>'required|max:100',
                   'role_id'=>'required',
                   'phone'=>'required|min:10',
                 ],
               );
        $userData->update($validatedUserData);
        Alert::success('Success','User Updated Successfully! ');
        return to_route('user');
    }

    public function setting($id){

        return view('home.settingPage');
    }

    public function changePassword($id,Request $request){
        $userData=User::findOrFail($id);
        $userId=$userData->id;
        $validatedData=$request->validate([
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'same:newPassword',
        ]);
        if($validatedData){
            $userData->password = bcrypt($request->input('newPassword'));
            $userData->save();
            Alert::success('Success','Password Updated Successfully!');
            return to_route('profile.show',$userId);
        }

    }
}

