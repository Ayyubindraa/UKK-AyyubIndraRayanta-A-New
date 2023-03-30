<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\MasyarakatController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('layouts/register');
});
Route::get('/login', function () {
    return view('layouts/login');
});
// Route::get('/index', function () {
//     return view('masyarakat/index');
// })->name('masyarakat.index');
// Route::get('/tambah-masyarakat', function () {
//     return view('masyarakat/tambah');
// });
// Route::get('/edit-masyarakat', function () {
//     return view('masyarakat/edit');
// });
Route::get('/edit-pengaduan', function () {
    return view('pengaduan/edit');
});

Route::get('/register', [RegisterController::class, 'showRegisterMasyarakat'])->name('register');
Route::post('/register', [RegisterController::class, 'registerMasyarakat']);
Route::get('/login', [LoginController::class, 'showLoginMasyarakat'])->name('login');
Route::post('/login', [LoginController::class, 'loginMasyarakat']);
Route::get('/petugas/login', [LoginController::class, 'showLoginPetugas'])->name('login.petugas');
Route::post('/petugas/login', [LoginController::class, 'loginPetugas']);
Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');

Route::middleware('isLogin')->group(function(){

    Route::middleware('isMasyarakat')->group(function(){
        Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
        Route::get('/pengaduan/tambah', [PengaduanController::class, 'create'])->name('pengaduan.tambah');
        Route::post('/pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
        Route::get('/pengaduan/edit/{id}', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
        Route::post('/pengaduan/update/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');
        Route::delete('/pengaduan/delete/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.delete');

    });

    Route::get('/layouts', [LoginController::class,'index']);
    Route::get('/petugas/pengaduan', [PengaduanController::class, 'indexPetugas'])->name('pengaduan.indexPetugas');
    Route::get('/petugas/tanggapan', [TanggapanController::class, 'index'])->name('tanggapan.index');
    Route::delete('/petugas/pengaduan/delete/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.deletePetugas');
    Route::get('/petugas/tanggapan/tambah/{id_pengaduan}', [TanggapanController::class, 'create'])->name('tanggapan.tambah');
    Route::post('/petugas/tanggapan/store/{id_pengaduan}', [TanggapanController::class, 'store'])->name('tanggapan.store');
    Route::get('/petugas/tanggapan/edit/{id}', [TanggapanController::class, 'edit'])->name('tanggapan.edit');
    Route::post('/petugas/tanggapan/update/{id}', [TanggapanController::class, 'update'])->name('tanggapan.update');
    Route::get('/petugas/tanggapan/delete/{id_tanggapan}', [TanggapanController::class, 'destroy'])->name('tanggapan.delete');
    Route::delete('/petugas/masyarakat/delete/{id}', [MasyarakatController::class, 'destroy'])->name('masyarakat.delete');



    Route::middleware('isAdmin')->group(function(){
        Route::get('/petugas/petugas', [PetugasController::class, 'index'])->name('petugas.index');
        Route::get('/petugas/petugas/tambah', [PetugasController::class, 'create'])->name('petugas.tambah');
        Route::post('/petugas/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
        Route::get('/petugas/petugas/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::post('/petugas/petugas/update/{id}', [PetugasController::class, 'update'])->name('petugas.update');
        Route::delete('/petugas/petugas/delete/{id}', [PetugasController::class, 'destroy'])->name('petugas.delete');
        Route::get('/petugas/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');
        Route::get('/generate_pdf', [TanggapanController::class, 'generatePDF'])->name('generate.pdf');
    });

});
