<?php
use App\http\Controllers\HomeController;
use App\http\Controllers\InfoController;
// use App\http\Controllers\CategoryController;
use App\http\Controllers\MenuController;
use App\http\Controllers\StokController;
use App\http\Controllers\UserController;
use App\http\Controllers\JenisController;
use App\http\Controllers\PelangganController;
use App\http\Controllers\PemesananController;
use App\http\Controllers\TransaksiController;
use App\http\Controllers\AplikasiController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['cekUserLogin:1']], function(){
    Route::resource('/home', HomeController::class);
    Route::resource('/informasi', InfoController::class);

    Route::resource('/jenis', jenisController::class);
    Route::get('export/jenis',[JenisController::class, 'exportData'])->name('export-jenis');
    Route::post('jenis/import',[JenisController::class, 'importData'])->name('import-excel');

    Route::resource('/menu', MenuController::class);
    Route::get('export/menu',[MenuController::class, 'exportData'])->name('export-menu');
    Route::post('menu/import',[MenuController::class, 'importData'])->name('import-excel');

    Route::resource('/stok', StokController::class); 
    Route::get('export/stok',[StokController::class, 'exportData'])->name('export-stok');
    Route::post('stok/import',[StokController::class, 'importData'])->name('import-excel'); 

    //Route::resource('/category', CategoryController::class); 
});


Route::group(['middleware'=>['cekUserLogin:2']], function(){
    Route::resource('/informasi', InfoController::class);
    Route::resource('/pelanggan', PelangganController::class);
    Route::resource('/pemesanan', PemesananController::class);

    Route::resource('/aplikasi', AplikasiController::class);
    Route::get('export/aplikasi',[AplikasiController::class, 'exportData'])->name('export-aplikasi');
    Route::post('aplikasi/import',[AplikasiController::class, 'importData'])->name('import-excel');

    Route::resource('/transaksi', TransaksiController::class);
    Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
});


//Login 
// Route::resource('/login', UserController::class);
    Route::get('/login', [UserController::class, 'index']);
    Route::post('/login/cek',[UserController::class, 'ceklogin']) ->name('ceklogin');
    Route::get('/logout',[UserController::class, 'logout']) ->name('logout');