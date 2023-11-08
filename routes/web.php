<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PlotsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
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

Route::get('/dashboard', [ManagementController::class, 'index'])->name('index')->middleware('auth');

//auth routes
Route::get('/', [AuthController::class, 'login'])->name('login');

Route::post('/createLogin',[AuthController::class, 'createLogin'])->name('createLogin');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


//roles routes
Route::get('/roles', [RolesController::class, 'getRoles'])->name('roles')->middleware('auth');

Route::get('/editRole/{id}', [RolesController::class, 'editRolePage'])->name('editRole')->middleware('auth');

Route::post('/createEditRole/{id}',[RolesController::class, 'createEditRole'])->name('createEditRole')->middleware('auth');

Route::get('/roles/addRole', [RolesController::class, 'getAddRole'])->name('getAddRole')->middleware('auth');

Route::post('/addrole',[RolesController::class, 'addrole'])->name('addrole')->middleware('auth');

Route::post('/role/{id}/delete',[RolesController::class, 'deleteRole'])->name('deleteRole')->middleware('auth');



//user controller
Route::get('/users', [UserController::class, 'getUser'])->name('user')->middleware('auth');

Route::get('/users/addUser', [UserController::class, 'getAddUser'])->name('getAddUser')->middleware('auth');

Route::post('/adduser',[UserController::class, 'addUser'])->name('adduser')->middleware('auth');

Route::get('/users/edit/{id}', [UserController::class,'editUserPage'])->name('getEditUser')->middleware('auth');

Route::put('/users/edit/{id}', [UserController::class,'editUser'])->name('editUser')->middleware('auth');

Route::post('/user/activate/{id}', [UserController::class, 'activateUser'])->name('activateUser')->middleware('auth');

Route::post('/user/deactivate/{id}', [UserController::class, 'deactivateUser'])->name('deactivateUser')->middleware('auth');

Route::get('/user/Details/{id}', [UserController::class, 'userDetails'])->name('userDetails')->middleware('auth');

Route::post('/user/resendPassword/{id}', [UserController::class, 'resendPassword'])->name('resendPassword')->middleware('auth');


//projects routes
Route::get('/projects', [ProjectController::class,'getProjectsPage'])->name('projects')->middleware('auth');

Route::get('/AddProject',[ProjectController::class, 'addProjectPage'])->name('addProjectPage')->middleware('auth');

Route::post('/addProjects', [ProjectController::class,'addProject'])->name('addProject')->middleware('auth');

Route::get('/projectDetails/{id}', [ProjectController::class,'ProjectsDetails'])->name('projectDetails')->middleware('auth');

Route::get('/editProject/{id}', [ProjectController::class,'editProjectsPage'])->name('editProjectPage')->middleware('auth');

Route::put('/editProject/{id}', [ProjectController::class,'editProject'])->name('editProject')->middleware('auth');

Route::post('/deleteProject/{id}', [ProjectController::class,'deleteProject'])->name('deleteProject')->middleware('auth');


//plots routes
Route::get('/project/{id}/plots',[PlotsController::class,'viewPlots'])->name('viewPlots')->middleware('auth');

Route::get('/project/{id}/plots/addPlot', [PlotsController::class,'viewAddPlot'])->name('viewAddPlot')->middleware('auth');

Route::post('/project/addPlot', [PlotsController::class, 'addPlot'])->name('addPlot')->middleware('auth');

Route::get('/project/{id}/plot/plotDetails', [PlotsController::class,'plotDetails'])->name('plotDetails')->middleware('auth');

Route::get('/project/{id}/plot/plotEdit', [PlotsController::class,'plotEdit'])->name('plotEdit')->middleware('auth');

Route::put('/project/editPlot/{id}', [PlotsController::class, 'createPlotEdit'])->name('editPlot')->middleware('auth');

Route::post('/project/deletePlot/{id}', [PlotsController::class, 'deletePlot'])->name('deletePlot')->middleware('auth');


Route::middleware(['auth'])->group(function(){
    //customers routes
    Route::get('/customers', [CustomerController::class, 'viewCustomers'])->name('viewCustomers');
    Route::get('/addCustomer', [CustomerController::class, 'addCustomerPage'])->name('addCustomerPage');
    Route::post('/addCustomer', [CustomerController::class, 'addCustomer'])->name('addCustomer');
    Route::get('/customerDetails/{id}', [CustomerController::class, 'customerDetails'])->name('customerDetails');
    Route::get('/editCustomer/{id}', [CustomerController::class, 'editCustomerPage'])->name('editCustomer');
    Route::put('/editCustomer/{id}', [CustomerController::class, 'editCustomer'])->name('customer');
    Route::post('/deleteCustomer/{id}', [CustomerController::class, 'deleteCustomer'])->name('deleteCustomer');

// payment method
    Route::get('/paymentMethods',[PaymentMethodController::class,'paymentMethodPage'])->name('paymentMethod');
    Route::get('/addPaymentMethod',[PaymentMethodController::class, 'addPaymentMethodPage'])->name('addPaymentMethodPage');
    Route::post('/addPaymentMethod',[PaymentMethodController::class, 'addPaymentMethod'])->name('addPaymentMethod');
    Route::post('/deletePaymentMethod/{id}',[PaymentMethodController::class, 'deletePaymentMethod'])->name('deletePaymentMethod');
    Route::get('/editPaymentMethod/{id}', [PaymentMethodController::class, 'editPaymentMethodPage'])->name('editPaymentMethodPage');
    Route::put('/editPaymentMethod/{id}', [PaymentMethodController::class,'editPaymentMethod'])->name('editPaymentMethod');
});


