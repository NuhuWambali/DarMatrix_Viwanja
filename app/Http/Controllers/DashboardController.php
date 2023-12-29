<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Plot;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalProjects=Project::count();
        $totalPlots=Plot::count();
        $netAmount = Payment::sum('amount_paid');
        if ($totalCustomers) {
            return view('home.dashboard', compact('totalProjects','totalCustomers','totalPlots','netAmount'));
        }

        return view('home.dashboard',compact('totalProjects','totalCustomers','totalPlots','netAmount'));
    }

}
