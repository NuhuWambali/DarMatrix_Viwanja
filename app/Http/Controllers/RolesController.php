<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    //
    public function getRoles(){
        return view('home.roles');
    }
}
