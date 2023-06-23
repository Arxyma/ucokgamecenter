<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasetController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\Middleware\CheckRoles;

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


// Route::get('/kaset/cetakpdf', [KasetController::class, 'cetakpdf']);
// Route::get('/kaset/export_excel', [KasetController::class, 'export_excel']);



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    
    Route::middleware('role:admin')->group(function () {
    
        Route::get('/', [KasetController::class, 'welcomePage']);
        Route::get('/kaset', [KasetController::class, 'tampil']);
        Route::get('/kaset/tambah-kaset', [KasetController::class, 'tambah']);
        Route::post('/kaset/store', [KasetController::class, 'simpan']);
        Route::get('/kaset/hapus/{id_kaset}', [KasetController::class, 'hapus']);
        Route::get('/kaset/ubah/{id_kaset}', [KasetController::class, 'ubah']);
        Route::post('/kaset/edit', [KasetController::class, 'edit']);
        
        // Penyewa
        Route::get('/penyewa', [PenyewaController::class, 'tampil']);
        Route::get('/penyewa/tambah-penyewa', [PenyewaController::class, 'tambah']);
        Route::post('/penyewa/store', [PenyewaController::class, 'simpan']);
        Route::get('/penyewa/hapus/{id_penyewa}', [PenyewaController::class, 'hapus']);
        Route::get('/penyewa/ubah/{id_penyewa}', [PenyewaController::class, 'ubah']);
        Route::post('/penyewa/edit', [PenyewaController::class, 'edit']);
        
        // Transaksi
        
        Route::get('/transaksi/tambah-transaksi', [TransaksiController::class, 'tambah']);
        Route::post('/transaksi/store', [TransaksiController::class, 'simpan']);
        // Route::get('/transaksi/hapus/{id_penyewa}', [TransaksiController::class, 'hapus']);
        // Route::get('/transaksi/ubah/{id_penyewa}', [TransaksiController::class, 'ubah']);
        Route::post('/transaksi/edit', [TransaksiController::class, 'edit']);
        Route::get('/get-penyewa-info/{id_penyewa}', [TransaksiController::class, 'getPenyewaInfo']);
        Route::get('/get-kaset-info/{id_kaset}', [TransaksiController::class, 'getKasetInfo']);
        
        // Pengembalian
        
        Route::get('/pengembalian/tambah-pengembalian', [PengembalianController::class, 'tambah']);
        Route::post('/pengembalian/store', [PengembalianController::class, 'simpan']);
        // Route::get('/pengembalian/hapus/{id_penyewa}', [PengembalianController::class, 'hapus']);
        // Route::get('/pengembalian/ubah/{id_penyewa}', [PengembalianController::class, 'ubah']);
        Route::post('/pengembalian/edit', [PengembalianController::class, 'edit']);
        Route::get('/get-transaksi-info/{id_transaksi}', [PengembalianController::class, 'getTransaksiInfo']);
        
        // Akun
        Route::get('/akun/penyewa', [AkunController::class, 'penyewa']);
        Route::get('/akun/admin', [AkunController::class, 'admin']);
        Route::get('/akun/tambah-akun', [AkunController::class, 'tambah']);
        Route::post('/akun/store', [AkunController::class, 'simpan']);
        Route::get('/akun/hapus/{id}', [AkunController::class, 'hapus']);
        Route::get('/akun/ubah/{id}', [AkunController::class, 'ubah']);
        Route::post('/akun/edit', [AkunController::class, 'edit']);
    });
    
    // Pengecualian Penyewa
    Route::middleware('role:admin|penyewa')->group(function () {
        
        Route::get('/transaksi', [TransaksiController::class, 'tampil']);
        Route::get('/pengembalian', [PengembalianController::class, 'tampil']);
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});



    


    

