<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AyatController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\JemaatController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\TardidiController;
use App\Http\Controllers\Admin\MaluaController;
use App\Http\Controllers\Admin\MenikahController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\DistrikController;
use App\Http\Controllers\Admin\JadwalsController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\KeluargaController;
use App\Http\Controllers\Admin\PenatuaController;
use App\Http\Controllers\Admin\IbadahController;
use App\Http\Controllers\Admin\PartangianganController;
use App\Http\Controllers\PdfController;

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
// Route::get('/convert-to-pdf', 'PdfController@convertBladeToPdf')->name('conv_pdf');
Route::get('/malua-pdf/{id}', [PdfController::class, 'malua'])->name('malua_pdf');
Route::get('/tardidi-pdf/{id}', [PdfController::class, 'tardidi'])->name('tardidi_pdf');
Route::get('/menikah-pdf/{id}', [PdfController::class, 'menikah'])->name('menikah_pdf');
Route::get('/jemaat-pdf/{id}', [PdfController::class, 'jemaat'])->name('jemaat_pdf');
Route::get('/userjemaat-pdf', [PdfController::class, 'userjemaat'])->name('userjemaat_pdf');
Route::get('/get-keluarga-by-sektor', [PartangianganController::class, 'getKeluargaBySektor'])->name('get-keluarga-by-sektor');



Route::namespace('App\Http\Controllers\Admin')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login_action'])->name('login.action');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.action');   
    
        Route::prefix('admin')->middleware(['role:admin'])->name('admin.')->group(function(){
            Route::get('/', [AuthController::class, 'home'])->name('home');            
            Route::get('regis', [UserController::class, 'register'])->name('regis');
            Route::post('regis', [UserController::class, 'do_reg'])->name('reg.action');
    
            
            Route::resource('/pendaftaran/malua', MaluaController::class);
            
            Route::resource('/pendaftaran/menikah',  MenikahController::class);
            
            Route::resource('/pendaftaran/tardidi',  TardidiController::class);
            
            Route::resource('/jemaat/pengurus',  PengurusController::class);
            
            Route::resource('/jemaat/jemaat',  JemaatController::class);
    
            Route::resource('/jemaat/keluarga',  KeluargaController::class);   
            
            Route::resource('/jemaat/jadwal/partangiangan',  PartangianganController::class);
    
            Route::resource('/jemaat/jadwal/ibadah',  IbadahController::class);   
            
            Route::resource('/jemaat/distrik',  DistrikController::class);
            
            Route::resource('/jemaat/keuangan',  KeuanganController::class);
            
            Route::resource('/jemaat/jadwal',  JadwalsController::class);
    
            Route::resource('/jemaat/penatua',  PenatuaController::class);
    
            Route::resource('/ayat',  AyatController::class);
    
            Route::resource('/akun',  AkunController::class);
    
            Route::resource('/jemaat/pengumuman', PengumumanController::class);
    
        });
        Route::prefix('sek')->middleware(['role:sekretariat'])->name('sek.')->group(function(){         
            Route::get('/', [AuthController::class, 'home'])->name('home');  
            
            Route::resource('/pendaftaran/malua', MaluaController::class);
    
            Route::resource('/pendaftaran/menikah',  MenikahController::class);
    
            Route::resource('/pendaftaran/tardidi',  TardidiController::class);
    
            Route::resource('/jemaat/pengurus',  PengurusController::class);
    
            Route::resource('/jemaat/penatua',  PenatuaController::class);
    
            Route::resource('/jemaat/jemaat',  JemaatController::class);
            
            Route::resource('/jemaat/jadwal/partangiangan',  PartangianganController::class);
    
            Route::resource('/jemaat/jadwal/ibadah',  IbadahController::class);   
    
            Route::resource('/jemaat/keluarga',  KeluargaController::class);   
    
            Route::resource('/jemaat/distrik',  DistrikController::class);
            
            Route::resource('/jemaat/keuangan',  KeuanganController::class);
            
            Route::resource('/jemaat/jadwal',  JadwalsController::class);
    
            Route::resource('/ayat',  AyatController::class);
    
            Route::resource('/jemaat/pengumuman', PengumumanController::class);
        });    
    
});


