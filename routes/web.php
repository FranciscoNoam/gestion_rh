<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemandeAbsenceController;
use App\Http\Controllers\DemandeCongerController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NouveauCompteController;

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
        Route::get('/logout', [LogoutController::class,'perform'])->name('logout');
    });

Route::get('/', function () {
    return view('admin.index');
});

Route::get('connection', function(){
    return view('admin.index');
})->name('connection');

// =================== URL Nouveau Employer ===================================

Route::resource('nouveau',  NouveauCompteController::class);
Route::get('nouveau',  [NouveauCompteController::class,'nouveau'])->name('nouveau');


// ================== URL SuperAdmin ==================================

Route::get('superadmin.nouveau.secret', [AdminController::class,'nouveau_super_admin'])->name('superadmin.nouveau.secret');
Route::post('admin.store.super.admin', [AdminController::class,'store_nouveau_super_admin'])->name('admin.store.super.admin');
// =============== URL ADMIN ===============================
Route::resource('admin', AdminController::class);
Route::get('admin.nouveau', [AdminController::class,'nouveau'])->name('admin.nouveau');
Route::get('admin.generale', [AdminController::class,'global'])->name('admin.generale');
Route::post('admin.login', [AdminController::class,'login'])->name('admin.login');

Route::get('home', [HomeController::class,'index'])->name('home');
// =============== URL EMPLOYER ==================================
Route::resource('employe',EmployerController::class)->except(['update','destroy']);
Route::post('employe.update/{id}',[EmployerController::class,'update'])->name('employe.update');
Route::get('employe.destroy/{id}',[EmployerController::class,'destroy'])->name('employe.destroy');
Route::post('employe.filtre',[EmployerController::class,'filtre'])->name('employe.filtre');

// =============== URL DEPARTEMENT ==================================
Route::resource('departement',DepartementController::class)->except(['update','destroy']);
Route::post('departement.update/{id}',[DepartementController::class,'update'])->name('departement.update');
Route::get('departement.destroy/{id}',[DepartementController::class,'destroy'])->name('departement.destroy');
// =============== URL GENRE ==================================
Route::resource('genre',GenreController::class)->except(['update','destroy']);
Route::post('genre.update/{id}',[GenreController::class,'update'])->name('genre.update');
Route::get('genre.destroy/{id}',[GenreController::class,'destroy'])->name('genre.destroy');
// =============== URL POSTE ==================================
Route::resource('poste',PosteController::class)->except(['update','destroy']);
Route::post('poste.update/{id}',[PosteController::class,'update'])->name('poste.update');
Route::get('poste.destroy/{id}',[PosteController::class,'destroy'])->name('poste.destroy');
// =============== URL DEMMANDE CONGER ==================================
Route::resource('demandeconger',DemandeCongerController::class)->except(['update','destroy']);
Route::post('demandeconger.update/{id}',[DemandeCongerController::class,'update'])->name('demandeconger.update');
Route::get('demandeconger.destroy/{id}',[DemandeCongerController::class,'destroy'])->name('demandeconger.destroy');
// =============== URL DEMMANDE ABSENCE ==================================
Route::resource('demandeabsence',DemandeAbsenceController::class)->except(['update','destroy']);
Route::post('demandeabsence.update/{id}',[DemandeAbsenceController::class,'update'])->name('demandeabsence.update');
Route::get('demandeabsence.destroy/{id}',[DemandeAbsenceController::class,'destroy'])->name('demandeabsence.destroy');
