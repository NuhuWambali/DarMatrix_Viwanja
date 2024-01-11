<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Plot;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


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

    // public function generateExcel()
    // {
    //     // Create a new PhpSpreadsheet instance
    //     $spreadsheet = new Spreadsheet();

    //     // Add data to the spreadsheet
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $sheet->setCellValue('A1', 'Nuhu');
    //     $sheet->setCellValue('B1', 'Adams');

    //     // Save the spreadsheet to a file
    //     $filename = storage_path('app/project_report.xlsx');
    //     $writer = new Xlsx($spreadsheet);
    //     $writer->save($filename);

    //     // Return a response to download the file
    //     return response()->download($filename, 'project_report.xlsx');
    // }

    public function generateExcel()
    {
        $data = Project::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $columnHeaders = ['Name', 'Address','City',
        'Region','Total Plots','Available Plots',
        'Unavailable Plots','Descriptions','Status',
        'Plot Number','Block','Installment Period',
        'Price Per SQM','Start Date','End Date',
        'Created By','Updated By','Created At','Updated At',
    ];
        $columnIndex = 1;
        foreach ($columnHeaders as $header) {
            $sheet->setCellValueByColumnAndRow($columnIndex, 1, $header);
            $columnIndex++;
        }
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValueByColumnAndRow(1, $row, $item->name);
            $sheet->setCellValueByColumnAndRow(2, $row, $item->address);
            $sheet->setCellValueByColumnAndRow(3, $row, $item->city);
            $sheet->setCellValueByColumnAndRow(4, $row, $item->region);
            $sheet->setCellValueByColumnAndRow(5, $row, $item->total_plots);
            $sheet->setCellValueByColumnAndRow(6, $row, $item->available_plots);
            $sheet->setCellValueByColumnAndRow(7, $row, $item->unavailable_plots);
            $sheet->setCellValueByColumnAndRow(8, $row, $item->description);
            $sheet->setCellValueByColumnAndRow(9, $row, $item->status);
            $sheet->setCellValueByColumnAndRow(10, $row, $item->plot_number);
            $sheet->setCellValueByColumnAndRow(11, $row, $item->block);
            $sheet->setCellValueByColumnAndRow(12, $row, $item->installment_period);
            $sheet->setCellValueByColumnAndRow(13, $row, $item->price_per_sqm);
            $sheet->setCellValueByColumnAndRow(14, $row, $item->start_date);
            $sheet->setCellValueByColumnAndRow(15, $row, $item->end_date);
            $sheet->setCellValueByColumnAndRow(16, $row, $item->created_by);
            $sheet->setCellValueByColumnAndRow(17, $row, $item->updated_by);
            $sheet->setCellValueByColumnAndRow(18, $row, $item->created_at);
            $sheet->setCellValueByColumnAndRow(19, $row, $item->updated_at);
            $row++;
        }


        $filename = storage_path('app/project_report.xlsx');
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);


        return response()->download($filename, 'project_report.xlsx');
    }
}
