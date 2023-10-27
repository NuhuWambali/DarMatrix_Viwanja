<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
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
