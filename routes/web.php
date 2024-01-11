<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PlotsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.mainLayouts');
// });


//auth routes
Route::get('/', [AuthController::class, 'login'])->name('login');

Route::post('/createLogin',[AuthController::class, 'createLogin'])->name('createLogin');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


 Route::middleware(['auth'])->group(function(){
     //dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

    //roles routes
    Route::get('/roles', [RolesController::class, 'getRoles'])->name('roles');
    Route::get('/editRole/{id}', [RolesController::class, 'editRolePage'])->name('editRole');
    Route::post('/createEditRole/{id}',[RolesController::class, 'createEditRole'])->name('createEditRole');
    Route::get('/roles/addRole', [RolesController::class, 'getAddRole'])->name('getAddRole');
    Route::post('/addrole',[RolesController::class, 'addrole'])->name('addrole');
    Route::post('/role/{id}/delete',[RolesController::class, 'deleteRole'])->name('deleteRole');

    //user routers
    Route::get('/users', [UserController::class, 'getUser'])->name('user');
    Route::get('/users/addUser', [UserController::class, 'getAddUser'])->name('getAddUser');
    Route::post('/adduser',[UserController::class, 'addUser'])->name('adduser');
    Route::get('/users/edit/{id}', [UserController::class,'editUserPage'])->name('getEditUser');
    Route::put('/users/edit/{id}', [UserController::class,'editUser'])->name('editUser');
    Route::post('/user/activate/{id}', [UserController::class, 'activateUser'])->name('activateUser');
    Route::post('/user/deactivate/{id}', [UserController::class, 'deactivateUser'])->name('deactivateUser');
    Route::get('/user/Details/{id}', [UserController::class, 'userDetails'])->name('userDetails');
    Route::post('/user/resendPassword/{id}', [UserController::class, 'resendPassword'])->name('resendPassword');


    //projects routes
    Route::get('/projects', [ProjectController::class,'getProjectsPage'])->name('projects');
    Route::get('/AddProject',[ProjectController::class, 'addProjectPage'])->name('addProjectPage');
    Route::post('/addProjects', [ProjectController::class,'addProject'])->name('addProject');
    Route::get('/projectDetails/{id}', [ProjectController::class,'ProjectsDetails'])->name('projectDetails');
    Route::get('/editProject/{id}', [ProjectController::class,'editProjectsPage'])->name('editProjectPage');
    Route::put('/editProject/{id}', [ProjectController::class,'editProject'])->name('editProject');
    Route::post('/deleteProject/{id}', [ProjectController::class,'deleteProject'])->name('deleteProject');

    //plots routes
    Route::get('/project/{id}/plots',[PlotsController::class,'viewPlots'])->name('viewPlots');
    Route::get('/project/{id}/plots/addPlot', [PlotsController::class,'viewAddPlot'])->name('viewAddPlot');
    Route::post('/project/addPlot', [PlotsController::class, 'addPlot'])->name('addPlot');
    Route::get('/project/{id}/plot/plotDetails', [PlotsController::class,'plotDetails'])->name('plotDetails');
    Route::get('/project/{id}/plot/plotEdit', [PlotsController::class,'plotEdit'])->name('plotEdit');
    Route::put('/project/editPlot/{id}', [PlotsController::class, 'createPlotEdit'])->name('editPlot');
    Route::post('/project/deletePlot/{id}', [PlotsController::class, 'deletePlot'])->name('deletePlot');
    Route::get('/get-plots/{projectId}', [PlotsController::class, 'getPlots'])->name('plots');

    //customers routes
    Route::get('/customers', [CustomerController::class, 'viewCustomers'])->name('viewCustomers');
    Route::get('/addCustomer', [CustomerController::class, 'addCustomerPage'])->name('addCustomerPage');
    Route::post('/addCustomer', [CustomerController::class, 'addCustomer'])->name('addCustomer');
    Route::get('/customerDetails/{id}', [CustomerController::class, 'customerDetails'])->name('customerDetails');
    Route::get('/editCustomer/{id}', [CustomerController::class, 'editCustomerPage'])->name('editCustomer');
    Route::put('/editCustomer/{id}', [CustomerController::class, 'editCustomer'])->name('customer');
    Route::get('/deleteCustomer/{id}', [CustomerController::class, 'deleteCustomer'])->name('deleteCustomer');


    //payment method
    Route::get('/paymentMethods',[PaymentMethodController::class,'paymentMethodPage'])->name('paymentMethod');
    Route::get('/addPaymentMethod',[PaymentMethodController::class, 'addPaymentMethodPage'])->name('addPaymentMethodPage');
    Route::post('/addPaymentMethod',[PaymentMethodController::class, 'addPaymentMethod'])->name('addPaymentMethod');
    Route::post('/deletePaymentMethod/{id}',[PaymentMethodController::class, 'deletePaymentMethod'])->name('deletePaymentMethod');
    Route::get('/editPaymentMethod/{id}', [PaymentMethodController::class, 'editPaymentMethodPage'])->name('editPaymentMethodPage');
    Route::put('/editPaymentMethod/{id}', [PaymentMethodController::class,'editPaymentMethod'])->name('editPaymentMethod');

    //order
     Route::get('/assignPlots/customer_id/{id}', [OrderController::class, 'assignPlotsPage'])->name('assignPlots');
     Route::post('/assignPlot', [OrderController::class, 'assignPlots'])->name('assign.plots');
     Route::delete('/deleteOrder/{orderId}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');

     //payment
     Route::get('/payment/order_id/{id}',[PaymentController::class,'paymentDetails'])->name('payment');
     Route::post('/addPayment/order_id/{id}',[PaymentController::class,'addPayment'])->name('addPayment');

     //setting routes
    Route::get('/profile/{userId}',[UserController::class,'profile'])->name('profile.show');
    Route::put('updateProfile/{userId}',[UserController::class,'updateProfile'])->name('updateProfile');
    Route::get('setting/{userId}',[UserController::class,'setting'])->name('setting.show');
    Route::put('changePassword/{userId}',[UserController::class,'changePassword'])->name('changePassword');

    //report routes
    Route::get('/customerReport',[ReportController::class,'customerReport'])->name('customer_report.show');
    Route::get('/downloadCustomerReport', [ReportController::class,'downloadCustomersReportPDF'])->name('downloadCustomersReportPDF');
    Route::get('/projectReport',[ReportController::class,'projectReport'])->name('project_report.show');
    Route::get('/downloadProjectReport',[ReportController::class,'downloadProjectsReportPDF'])->name('downloadProjectsReportPDF');
    Route::get('/plotsReport',[ReportController::class,'plotsReport'])->name('plot_report.show');
    Route::get('/downloadPlotsReport',[ReportController::class,'downloadPlotsReportPDF'])->name('downloadPlotsReportPDF');
    Route::get('/paymentReport',[ReportController::class,'paymentReport'])->name('payment_report.show');
    Route::get('/downloadPaymentReportPDF',[ReportController::class,'downloadPaymentReportPDF'])->name('downloadPaymentsReportPDF');

    //excel
    Route::get('/download-excel-projects', [ReportController::class, 'generateProjectExcel'])->name('downloadExcelProject');
    Route::get('/download-excel-customers', [ReportController::class, 'generateCustomerExcel'])->name('downloadExcelCustomer');
    Route::get('/download-excel-plots', [ReportController::class, 'generatePlotExcel'])->name('downloadExcelPlot');





 });

