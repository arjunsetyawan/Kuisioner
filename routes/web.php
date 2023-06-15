<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjuanController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\KuisionerController;
use App\Http\Controllers\DataDivisiController;
use App\Http\Controllers\PertanyaanController;
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

//Dashboard
Route::get('/', [DashboardController::class, 'index']);

//Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

//Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


//User -> Profil
Route::middleware(['auth', 'IsUser'])->group(function () {

    Route::get('/profile', [ProfilController::class, 'index'])->name('viewprofil');
    Route::post('/profile/tambah', [ProfilController::class, 'store']);

    //User -> Kuisioner (harus isi profil dulu)
    Route::middleware(['CekProfile'])->group(function () {

        Route::get('/kuisioner', [KuisionerController::class, 'index'])->name('viewkuisioner');
        Route::post('/kuisioner/tambah', [KuisionerController::class, 'store']);
    });

    //User -> Hasil
    Route::get('/hasil', [HasilController::class, 'hasilPenilaian']);
    Route::get('/cetak', [HasilController::class, 'cetakPenilaian'])->name('cetakkuisioner');
});

Route::middleware(['auth', 'IsAdmin'])->group(function () {

    //Admin -> Data User
    Route::get('/datauser', [DataUserController::class, 'index'])->name('viewuser');
    Route::get('/datauser/create', [DataUserController::class, 'create'])->name('createuser');
    Route::post('/datauser/tambah', [DataUserController::class, 'store']);
    Route::get('/datauser/edit/{id}', [DataUserController::class, 'edit'])->name('edituser');
    Route::post('/datauser/update/{id}', [DataUserController::class, 'update'])->name('updateuser');
    Route::post('/datauser/delete/{id}', [DataUserController::class, 'destroy'])->name('deleteuser');

    //Admin -> Data Admin
    Route::get('/dataadmin', [DataAdminController::class, 'index'])->name('viewadmin');
    Route::get('/dataadmin/create', [DataAdminController::class, 'create'])->name('createadmin');
    Route::post('/dataadmin/tambah', [DataAdminController::class, 'store']);
    Route::get('/dataadmin/edit/{id}', [DataAdminController::class, 'edit'])->name('editadmin');
    Route::post('/dataadmin/update/{id}', [DataAdminController::class, 'update'])->name('updateadmin');
    Route::post('/dataadmin/delete/{id}', [DataAdminController::class, 'destroy'])->name('deleteadmin');

    //Admin -> Data Divisi
    Route::get('/viewdivisi', [DataDivisiController::class, 'index'])->name('viewdivisi');
    Route::get('/datadivisi/create', [DataDivisiController::class, 'create'])->name('createdivisi');
    Route::post('/datadivisi/tambah', [DataDivisiController::class, 'store']);
    Route::get('/datadivisi/edit/{id}', [DataDivisiController::class, 'edit'])->name('editdivisi');
    Route::post('/datadivisi/update/{id}', [DataDivisiController::class, 'update'])->name('updatedivisi');
    Route::post('/datadivisi/delete/{id}', [DataDivisiController::class, 'destroy'])->name('deletedivisi');

    //Admin -> Data Kriteria
    Route::get('/viewkriteria', [DataKriteriaController::class, 'index'])->name('viewkriteria');
    Route::get('/datakriteria/create', [DataKriteriaController::class, 'create'])->name('createkriteria');
    Route::post('/datakriteria/tambah', [DataKriteriaController::class, 'store']);
    Route::get('/datakriteria/edit/{id_kriteria}', [DataKriteriaController::class, 'edit'])->name('editkriteria');
    Route::post('/datakriteria/update/{id_kriteria}', [DataKriteriaController::class, 'update'])->name('updatekriteria');
    Route::post('/datakriteria/delete/{id_kriteria}', [DataKriteriaController::class, 'destroy'])->name('deletekriteria');

    //Admin -> Data Pertanyaan
    Route::get('/viewpertanyaan', [PertanyaanController::class, 'index'])->name('viewpertanyaan');
    Route::get('/datapertanyaan/create', [PertanyaanController::class, 'create'])->name('createpertanyaan');
    Route::post('/datapertanyaan/tambah', [PertanyaanController::class, 'store']);
    Route::get('/datapertanyaan/edit/{id}', [PertanyaanController::class, 'edit'])->name('editpertanyaan');
    Route::post('/datapertanyaan/update/{id}', [PertanyaanController::class, 'update'])->name('updatepertanyaan');
    Route::post('/datapertanyaan/delete/{id}', [PertanyaanController::class, 'destroy'])->name('deletepertanyaan');

    //Admin -> Data Ajuan
    Route::get('/viewajuan', [AjuanController::class, 'index'])->name('viewajuan');
    Route::get('/dataajuan/edit/{id}', [AjuanController::class, 'edit'])->name('editajuan');
    Route::post('/dataajuan/update/{id}', [AjuanController::class, 'update'])->name('updateajuan');


    //Admin -> Data Hasil
    Route::get('/viewhasil', [HasilController::class, 'index'])->name('viewhasil');

    //Admin -> Data Karyawan
    Route::get('/viewkaryawan', [KaryawanController::class, 'index'])->name('viewkaryawan');
});

Route::middleware(['auth', 'IsHRD'])->group(function () {

    //HRD -> Data User
    Route::get('/hrd/datauser', [DataUserController::class, 'index']);

    //HRD -> Data Admin
    Route::get('/hrd/dataadmin', [DataAdminController::class, 'index']);

    //HRD -> Data Divisi
    Route::get('/hrd/viewdivisi', [DataDivisiController::class, 'index']);

    //HRD -> Data Kriteria
    Route::get('/hrd/viewkriteria', [DataKriteriaController::class, 'index']);

    //HRD -> Data Pertanyaan
    Route::get('/hrd/viewpertanyaan', [PertanyaanController::class, 'index']);

    //HRD -> Data Ajuan
    Route::get('/hrd/viewajuan', [AjuanController::class, 'index']);

    //HRD -> Data Hasil
    Route::get('/hrd/viewhasil', [HasilController::class, 'index']);
    Route::get('/datahasil/cetak', [HasilController::class, 'cetak'])->name('cetakhasil');

    //HRD -> Data Karyawan
    Route::get('/hrd/viewkaryawan', [KaryawanController::class, 'index']);
});
