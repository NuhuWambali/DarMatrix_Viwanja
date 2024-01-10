<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Plot;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    //
    public function customerReport(){
        $totalCustomers=Customer::all()->count();
        $customers=Customer::latest()->paginate(10);
        return view('home.reportCustomer',compact('customers','totalCustomers'));
    }


    public function downloadCustomersReportPDF(){
        $customers=Customer::all();
        $date=now();
        $totalCustomers=Customer::all()->count();
        $pdf=PDF::loadView('home.download.CustomerReport',compact('customers','totalCustomers','date'));
        return $pdf->download('Customer_Report.pdf');
    }
    public function projectReport(){
        $totalProjects=Project::all()->count();
        $projects=Project::latest()->paginate(10);
        return view('home.reportProject',compact('projects','totalProjects'));
    }

    public function downloadProjectsReportPDF(){
        $projects=Project::all();
        $date=now();
        $totalProjects=Project::all()->count();
        $pdf=PDF::loadView('home.download.ProjectReport',compact('projects','totalProjects','date'));
        return $pdf->download('Project_Report.pdf');
    }
    public function plotsReport(){
        $totalPlots=Plot::all()->count();
        $plots=Plot::latest()->paginate(10);
        return view('home.reportPlot',compact('plots','totalPlots'));
    }
    public function downloadPlotsReportPDF(){
        $plots=Plot::all();
        $date=now();
        $totalPlots=Plot::all()->count();
        $pdf=PDF::loadView('home.download.plotReport',compact('plots','totalPlots','date'));
        return $pdf->download('Plots_Report.pdf');

    }

    public function paymentReport(){
        $payments=Payment::latest()->paginate(10);
        return view('home.reportPayment', compact('payments'));
    }

    public function downloadPaymentReportPDF(){
        $payments=Payment::all();
        $date=now();
        $totalPaidAmount=
        $totalunPaidAmount=
        $totalAmount=
        $pdf=PDF::loadView('home.download.plotReport',compact('plots','totalPlots','date'));
        return $pdf->download('Plots_Report.pdf');

    }


}
