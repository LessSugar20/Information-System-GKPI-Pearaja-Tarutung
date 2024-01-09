<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\PendaftaranController;
use App\Http\Controllers\User\JemaatController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\JadwalController;
use App\Http\Controllers\User\PengumumanController;
use App\Http\Controllers\Admin\TardidiController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\MaluaController;
use App\Http\Controllers\Admin\MenikahController;
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


Route::get('/', function () {
     return view('pages.user.home');
 });

Route::namespace('App\Http\Controllers\User')->group(function () {
    Route::get('/', [HomeController::class, 'beranda'])->name('home');
    Route::get('/registrasi', [AuthController::class, 'register'])->name('registrasi');        

    Route::get('/pendaftaran/menikah', [MenikahController::class, 'create'])->name('menikah');

    Route::post('/pendaftaran/menikah', [MenikahController::class, 'store'])->name('menikah.create');

    Route::get('/pendaftaran/tardidi', [TardidiController::class, 'create'])->name('tardidi');

    Route::post('/pendaftaran/tardidi', [TardidiController::class, 'store'])->name('tardidi.create');

    Route::get('/pendaftaran/malua', [MaluaController::class, 'create'])->name('malua');

    Route::post('/pendaftaran/malua', [MaluaController::class, 'store'])->name('malua.create');

    Route::get('/jemaat', [JemaatController::class, 'index_jemaat'])->name('jemaat');

    Route::get('/pengurus', [JemaatController::class, 'index_pengurus'])->name('pengurus');

    Route::get('/distrik', [JemaatController::class, 'index_distrik'])->name('distrik');

    Route::get('/keuangan', [JemaatController::class, 'index_keuangan'])->name('keuangan');

    Route::get('/about', [AboutController::class, 'index'])->name('about');    

    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');

    Route::get('/ibadah', [JadwalController::class, 'index'])->name('ibadah');
    Route::get('/ibadah/{id}/downloads', [JadwalController::class, 'downPartangiangan'])->name('partangiangan.download');
    Route::get('/ibadah/{id}/download', [JadwalController::class, 'downIbadah'])->name('ibadah.download');


    // Route::resource('/ibadah', JadwalController::class);
});

