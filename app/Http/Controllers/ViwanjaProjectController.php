<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViwanjaProjectController extends Controller
{
    //

    public function getProjectsPage(){
        return view('home.projects');
    }
}
