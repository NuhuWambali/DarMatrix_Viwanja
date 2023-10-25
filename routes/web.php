<?php

use App\Http\Controllers\ManagementController;
use App\Http\Controllers\RolesController;
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



//roles controller
Route::get('/roles', [RolesController::class, 'getRoles'])->name('roles');

Route::get('/roles/addRole', [RolesController::class, 'getAddRole'])->name('getAddRole');

Route::post('/addrole',[RolesController::class, 'addrole'])->name('addrole');

Route::post('/role/{id}/delete',[RolesController::class, 'deleteRole'])->name('deleteRole');
