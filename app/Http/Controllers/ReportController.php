<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Plot;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReportController extends Controller
{
    //
    public function customerReport(){
        $totalCustomers=Customer::all()->count();
        $customers=Customer::latest()->paginate(10);
        return view('home.reportCustomer',compact('customers','totalCustomers'));
    }


    public function downloadCustomersReportPDF(){
        $username=Auth::user()->username;
        $randomInvoiceNumber = now( ).mt_rand(1000000, 9999999);
        $customers=Customer::all();
        $date=now();
        $totalCustomers=Customer::all()->count();
        $pdf=PDF::loadView('home.download.CustomerReport',compact('customers','totalCustomers','date','username','randomInvoiceNumber'));
        return $pdf->download('Customer_Report.pdf');
    }
    public function projectReport(){
        $totalProjects=Project::all()->count();
        $projects=Project::latest()->paginate(10);
        return view('home.reportProject',compact('projects','totalProjects'));
    }

    public function downloadProjectsReportPDF(){
        $username=Auth::user()->username;
        $randomInvoiceNumber = now( ).mt_rand(1000000, 9999999);
        $projects=Project::all();
        $date=now();
        $totalProjects=Project::all()->count();
        $pdf=PDF::loadView('home.download.ProjectReport',compact('projects','totalProjects','date','username','randomInvoiceNumber'));
        return $pdf->download('Project_Report.pdf');
    }
    public function plotsReport(){
        $totalPlots=Plot::all()->count();
        $plots=Plot::latest()->paginate(10);
        return view('home.reportPlot',compact('plots','totalPlots'));
    }
    public function downloadPlotsReportPDF(){
        $username=Auth::user()->username;
        $randomInvoiceNumber = now( ).mt_rand(1000000, 9999999);
        $plots=Plot::all();
        $date=now();
        $totalPlots=Plot::all()->count();
        $pdf=PDF::loadView('home.download.plotReport',compact('plots','totalPlots','date','username','randomInvoiceNumber'));
        return $pdf->download('Plots_Report.pdf');

    }

    public function paymentReport(){
        $payments=Payment::latest()->paginate(10);
        return view('home.reportPayment', compact('payments'));
    }

    public function downloadPaymentReportPDF(){
        $username=Auth::user()->username;
        $randomInvoiceNumber = now( ).mt_rand(1000000, 9999999);
        $payments=Payment::all();
        $totalPaidCustomer=Payment::all()->count();
        $date=now();
        $totalPaidAmount = $payments->sum('amount_paid');
        $totalUnpaidAmount = $payments->sum('amount_remain');
        $totalAmount=$payments->sum('total_amount');
        $pdf=PDF::loadView('home.download.paymentReport',compact('payments','totalPaidAmount','totalUnpaidAmount','totalPaidCustomer','date','randomInvoiceNumber','username'));
        return $pdf->download('Payment_Report.pdf');

    }


}
