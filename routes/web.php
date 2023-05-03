<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataDivisiController;
use App\Http\Controllers\DataKriteriaController;

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

//Dashboard User
Route::get('/', [DashboardController::class, 'index']);

//Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

//Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//Admin -> Data User
Route::get('/datauser', [DataUserController::class, 'index'])->name('viewuser');
Route::get('/datauser/create', [DataUserController::class, 'create'])->name('createuser');
Route::post('/datauser/tambah', [DataUserController::class, 'store']);
Route::post('/datauser/delete/{id}', [DataUserController::class, 'destroy'])->name('deleteuser');

//Admin -> Data Admin
Route::get('/dataadmin', [DataAdminController::class, 'index'])->name('viewadmin');
Route::get('/dataadmin/create', [DataAdminController::class, 'create'])->name('createadmin');
Route::post('/dataadmin/tambah', [DataAdminController::class, 'store']);
Route::post('/dataadmin/delete/{id}', [DataAdminController::class, 'destroy'])->name('deleteadmin');

//Admin -> Data Divisi
Route::get('/viewdivisi', [DataDivisiController::class, 'index'])->name('viewdivisi');
Route::get('/datadivisi/create', [DataDivisiController::class, 'create'])->name('createdivisi');
Route::post('/datadivisi/tambah', [DataDivisiController::class, 'store']);
Route::post('/datadivisi/delete/{id}', [DataDivisiController::class, 'destroy'])->name('deletedivisi');

//Admin -> Data Kriteria
Route::get('/viewkriteria', [DataKriteriaController::class, 'index'])->name('viewkriteria');
Route::get('/datakriteria/create', [DataKriteriaController::class, 'create'])->name('createkriteria');
Route::post('/datakriteria/tambah', [DataKriteriaController::class, 'store']);
Route::post('/datakriteria/delete/{id}', [DataKriteriaController::class, 'destroy'])->name('deletekriteria');
