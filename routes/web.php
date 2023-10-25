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

Route::get('/', [ManagementController::class, 'index'])->name('index');

//auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');



//roles routes
Route::get('/roles', [RolesController::class, 'getRoles'])->name('roles');

Route::get('/roles/addRole', [RolesController::class, 'getAddRole'])->name('getAddRole');

Route::post('/addrole',[RolesController::class, 'addrole'])->name('addrole');

Route::post('/role/{id}/delete',[RolesController::class, 'deleteRole'])->name('deleteRole');



//user controller
Route::get('/user', [UserController::class, 'getUser'])->name('user');

Route::get('/user/addUser', [UserController::class, 'getAddUser'])->name('getAddUser');

Route::post('/adduser',[UserController::class, 'addUser'])->name('adduser');
