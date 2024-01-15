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

    //customer methods
    public function customerReport(){
        $totalCustomers=Customer::all()->count();
        $customers=Customer::latest()->paginate(10);
        return view('home.reportsPages.reportCustomer',compact('customers','totalCustomers'));
    }
    public function downloadCustomersReportPDF(){
        $username=Auth::user()->username;
        $randomInvoiceNumber = now( ).mt_rand(1000000, 9999999);
        $customers=Customer::all();
        $date=now();
        $totalCustomers=Customer::all()->count();
        $pdf=PDF::loadView('home.reportsTemplatesPDF.CustomerReport',compact('customers','totalCustomers','date','username','randomInvoiceNumber'));
        return $pdf->download('Customer_Report.pdf');
    }
    public function generateCustomerExcel()   {
        $data = Customer::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $columnHeaders = ['Fullname', 'Phone','Email',
        'Date Of Birth',' National Id Number','Address',
        'Description1','Description2','Description3',
        'Description4','Description5','Description6',
        'Status','Created By','Modified By','Created At','Updated At',
    ];
        $columnIndex = 1;
        foreach ($columnHeaders as $header) {
            $sheet->setCellValueByColumnAndRow($columnIndex, 1, $header);
            $columnIndex++;
        }
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValueByColumnAndRow(1, $row, $item->fullname);
            $sheet->setCellValueByColumnAndRow(2, $row, $item->phone_number);
            $sheet->setCellValueByColumnAndRow(3, $row, $item->email);
            $sheet->setCellValueByColumnAndRow(4, $row, $item->date_of_birth);
            $sheet->setCellValueByColumnAndRow(5, $row, $item->national_id_number);
            $sheet->setCellValueByColumnAndRow(6, $row, $item->address);
            $sheet->setCellValueByColumnAndRow(7, $row, $item->description1);
            $sheet->setCellValueByColumnAndRow(8, $row, $item->description2);
            $sheet->setCellValueByColumnAndRow(9, $row, $item->description3);
            $sheet->setCellValueByColumnAndRow(10, $row, $item->description4);
            $sheet->setCellValueByColumnAndRow(11, $row, $item->description5);
            $sheet->setCellValueByColumnAndRow(12, $row, $item->description6);
            $Status = ($item->status == 0) ? 'inActive' : 'active';
            $sheet->setCellValueByColumnAndRow(13, $row, $Status);
            $sheet->setCellValueByColumnAndRow(14, $row, $item->created_by);
            $sheet->setCellValueByColumnAndRow(15, $row, $item->modified_by);
            $sheet->setCellValueByColumnAndRow(16, $row, $item->created_at);
            $sheet->setCellValueByColumnAndRow(17, $row, $item->updated_at);
            $row++;
        }
        $filename = storage_path('app/customer_report.xlsx');
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
        return response()->download($filename, 'customer_report.xlsx');
    }

    //project methods
    public function projectReport(){
        $totalProjects=Project::all()->count();
        $projects=Project::latest()->paginate(10);
        return view('home.reportsPages.reportProject',compact('projects','totalProjects'));
    }

    public function downloadProjectsReportPDF(){
        $username=Auth::user()->username;
        $randomInvoiceNumber = now( ).mt_rand(1000000, 9999999);
        $projects=Project::all();
        $date=now();
        $totalProjects=Project::all()->count();
        $pdf=PDF::loadView('home.reportsTemplatesPDF.ProjectReport',compact('projects','totalProjects','date','username','randomInvoiceNumber'));
        return $pdf->download('Project_Report.pdf');
    }

    public function generateProjectExcel()
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

    //plots
    public function plotsReport(){
        $totalPlots=Plot::all()->count();
        $plots=Plot::latest()->paginate(10);
        return view('home.reportsPages.reportPlot',compact('plots','totalPlots'));
    }
    public function downloadPlotsReportPDF(){
        $username=Auth::user()->username;
        $randomInvoiceNumber = now( ).mt_rand(1000000, 9999999);
        $plots=Plot::all();
        $date=now();
        $totalPlots=Plot::all()->count();
        $pdf=PDF::loadView('home.reportsTemplatesPDF.plotReport',compact('plots','totalPlots','date','username','randomInvoiceNumber'));
        return $pdf->download('Plots_Report.pdf');

    }

    public function generatePlotExcel()
    {
        $data = Plot::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $columnHeaders = ['Project Id','Plot Number', 'Plot Size','Land Use',
        'Installment Period','Installment Price Per SQM ','Cash Price per SQM',  'Total Installment Value',
        'Total Cash Value','Description1','Description2',
        'Description3','Status','Created By',
        'Updated By','Created At','Updated At',
    ];
        $columnIndex = 1;
        foreach ($columnHeaders as $header) {
            $sheet->setCellValueByColumnAndRow($columnIndex, 1, $header);
            $columnIndex++;
        }
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValueByColumnAndRow(1, $row, $item->project_id);
            $sheet->setCellValueByColumnAndRow(2, $row, $item->plot_number);
            $sheet->setCellValueByColumnAndRow(3, $row, $item->plot_size);
            $sheet->setCellValueByColumnAndRow(4, $row, $item->land_use);
            $sheet->setCellValueByColumnAndRow(5, $row, $item->installment_period);
            $sheet->setCellValueByColumnAndRow(6, $row, $item->installment_price_per_sqm);
            $sheet->setCellValueByColumnAndRow(7, $row, $item->cash_price_per_sqm);
            $sheet->setCellValueByColumnAndRow(8, $row, $item->monthly_installment_price);
            $sheet->setCellValueByColumnAndRow(9, $row, $item->cash_total_value);
            $sheet->setCellValueByColumnAndRow(10, $row, $item->description1);
            $sheet->setCellValueByColumnAndRow(11, $row, $item->description2);
            $sheet->setCellValueByColumnAndRow(12, $row, $item->description3);
            $Status = ($item->status == 0) ? 'Taken' : 'Available';
            $sheet->setCellValueByColumnAndRow(13, $row,  $Status);
            $sheet->setCellValueByColumnAndRow(14, $row, $item->created_by);
            $sheet->setCellValueByColumnAndRow(15, $row, $item->updated_by);
            $sheet->setCellValueByColumnAndRow(16, $row, $item->created_at);
            $sheet->setCellValueByColumnAndRow(17, $row, $item->updated_at);
            $row++;
        }
        $filename = storage_path('app/plots_report.xlsx');
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
        return response()->download($filename, 'plots_report.xlsx');
    }

    //payments methods
    public function paymentReport(){
        $payments=Payment::latest()->paginate(10);
        return view('home.reportsPages.reportPayment', compact('payments'));
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
        $pdf=PDF::loadView('home.reportsTemplatesPDF.paymentReport',compact('payments','totalPaidAmount','totalUnpaidAmount','totalPaidCustomer','date','randomInvoiceNumber','username'));
        return $pdf->download('Payment_Report.pdf');

    }


    public function generatePaymentExcel()
    {
        $data = Payment::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $columnHeaders = ['Project Name','Plot Number','Total Amount', 'Amount Paid','Amount Remain',
        'Payment Status','Installment Number','Created By',  'Updated By',
        'Created At','Updated At',
    ];
        $columnIndex = 1;
        foreach ($columnHeaders as $header) {
            $sheet->setCellValueByColumnAndRow($columnIndex, 1, $header);
            $columnIndex++;
        }
        $row = 2;
        $row = 2;
        $totalAmountSum = 0;
        $amountPaidSum = 0;
        $amountRemainSum = 0;
        foreach ($data as $item) {
            $project = $item->order->plot->project->name;
            $sheet->setCellValueByColumnAndRow(1, $row, $project);
            $plot_number = $item->order->plot->plot_number;
            $sheet->setCellValueByColumnAndRow(2, $row, $plot_number);
            $sheet->setCellValueByColumnAndRow(3, $row, $item->total_amount);
            $sheet->setCellValueByColumnAndRow(4, $row, $item->amount_paid);
            $sheet->setCellValueByColumnAndRow(5, $row, $item->amount_remain);
            $paymentStatus = ($item->payment_status == 0) ? 'complete' : 'in progress';
            $sheet->setCellValueByColumnAndRow(6, $row, $paymentStatus);
            $sheet->setCellValueByColumnAndRow(7, $row, $item->installment_number);
            $sheet->setCellValueByColumnAndRow(8, $row, $item->created_by);
            $sheet->setCellValueByColumnAndRow(9, $row, $item->updated_by);
            $sheet->setCellValueByColumnAndRow(10, $row, $item->created_at);
            $sheet->setCellValueByColumnAndRow(11, $row, $item->updated_at);

            $totalAmountSum += $item->total_amount;
            $amountPaidSum += $item->amount_paid;
            $amountRemainSum += $item->amount_remain;
            $row++;
        }
        $row++;
        $sheet->setCellValueByColumnAndRow(1, $row, 'Total:');
        $sheet->setCellValueByColumnAndRow(3, $row, $totalAmountSum);
        $sheet->setCellValueByColumnAndRow(4, $row, $amountPaidSum);
        $sheet->setCellValueByColumnAndRow(5, $row, $amountRemainSum);
        $filename = storage_path('app/payments_report.xlsx');
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
        return response()->download($filename, 'payments_report.xlsx');
    }

}

