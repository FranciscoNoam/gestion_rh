<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\LogoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function() {

Route::post('admin.store.super.admin', [AdminController::class,'store_nouveau_super_admin'])->name('admin.store.super.admin');
Route::post('login', [LoginController::class,'login'])->name('login');

});

 Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });

Route::get('/', function () {
    return view('admin.index');
});


// ================== URL SuperAdmin ==================================

Route::get('superadmin.nouveau.secret', [AdminController::class,'nouveau_super_admin'])->name('superadmin.nouveau.secret');
Route::post('admin.store.super.admin', [AdminController::class,'store_nouveau_super_admin'])->name('admin.store.super.admin');
// =============== URL ADMIN ===============================
Route::resource('admin', AdminController::class);
Route::get('admin.nouveau', [AdminController::class,'nouveau'])->name('admin.nouveau');
Route::post('admin.login', [AdminController::class,'login'])->name('admin.login');

Route::get('home', [HomeController::class,'index'])->name('home');
// =============== URL EMPLOYER ==================================
Route::resource('employe',EmployerController::class);
