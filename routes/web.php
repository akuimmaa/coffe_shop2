<?php
use App\http\Controllers\HomeController;
use App\http\Controllers\InfoController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\MenuController;
use App\http\Controllers\StokController;
use App\http\Controllers\UserController;
use App\http\Controllers\JenisController;
use App\http\Controllers\MejaController;
use App\http\Controllers\PelangganController;
use App\http\Controllers\PemesananController;
use App\http\Controllers\TransaksiController;
use App\http\Controllers\AplikasiController;
use App\http\Controllers\AbsensiController;
use App\http\Controllers\LaporanController;
use App\http\Controllers\GrafikController;

use App\Models\Aplikasi;
use App\Models\Absensi;
use App\Models\Jenis;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Stok;
use App\Models\Laporan;

use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['cekUserLogin:1']], function(){
    Route::resource('/home', HomeController::class);
    Route::resource('/informasi', InfoController::class);
    Route::resource('/contact', HomeController::class);
    Route::get('grafik', [GrafikController::class, 'index']);
    Route::get('data_penjualan/{lastCount}', [GrafikController::class, 'data_penjualan']);



    Route::resource('/absensi', AbsensiController::class);
    Route::get('absensi-export-pdf',[AbsensiController::class, 'generatePDF'])->name('absensi-export-pdf');
    Route::get('export/absensi',[AbsensiController::class, 'exportData'])->name('export-absensi');
    Route::post('absensi/import',[AbsensiController::class, 'importData'])->name('import-absensi');

    Route::resource('/jenis', jenisController::class);
    Route::get('export-pdf-jenis',[JenisController::class, 'generatePDF'])->name('jenis-export-pdf');
    Route::get('export/jenis',[JenisController::class, 'exportData'])->name('export-jenis');
    Route::post('jenis/import',[JenisController::class, 'importData'])->name('import-jenis');

    Route::resource('/menu', MenuController::class);
    Route::get('export-pdf-menu',[MenuController::class, 'generatePDF'])->name('menu-export-pdf');
    Route::get('export/menu',[MenuController::class, 'exportData'])->name('export-menu');
    Route::post('menu/import',[MenuController::class, 'importData'])->name('import-menu');

    Route::resource('/stok', StokController::class);
    Route::get('stok-export-pdf',[StokController::class, 'generatePDF'])->name('stok-export-pdf');
    Route::get('export/stok',[StokController::class, 'exportData'])->name('export-stok');
    Route::post('stok/import',[StokController::class, 'importData'])->name('import-stok'); 

    Route::resource('/category', CategoryController::class);
    Route::get('category-export-pdf',[CategoryController::class, 'generatePDF'])->name('category-export-pdf');
    Route::get('export/category',[CategoryController::class, 'exportData'])->name('export-category');
    Route::post('category/import',[CategoryController::class, 'importData'])->name('import-category');

    Route::resource('/meja', MejaController::class);
    Route::get('meja-export-pdf',[MejaController::class, 'generatePDF'])->name('meja-export-pdf');
    Route::get('export/meja',[MejaController::class, 'exportData'])->name('export-meja');
    Route::post('meja/import',[MejaController::class, 'importData'])->name('import-meja');

});


Route::group(['middleware'=>['cekUserLogin:2']], function(){
    Route::resource('/informasi', InfoController::class);
    Route::resource('/contact', HomeController::class);

    Route::resource('/pelanggan', PelangganController::class);
    Route::get('pelanggan-export-pdf',[PelangganController::class, 'generatePDF'])->name('pelanggan-export-pdf');
    Route::get('export/pelanggan',[PelangganController::class, 'exportData'])->name('export-pelanggan');
    Route::post('pelanggan/import',[PelangganController::class, 'importData'])->name('import-pelanggan');
    
    Route::resource('/pemesanan', PemesananController::class);

    Route::resource('/aplikasi', AplikasiController::class);
    Route::get('aplikasi-export-pdf',[AplikasiController::class, 'generatePDF'])->name('aplikasi-export-pdf');
    Route::get('export/aplikasi',[AplikasiController::class, 'exportData'])->name('export-aplikasi');
    Route::post('aplikasi/import',[AplikasiController::class, 'importData'])->name('import-aplikasi');

    Route::resource('/transaksi', TransaksiController::class); 
    Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
});


Route::group(['middleware'=>['cekUserLogin:3']], function(){
    Route::resource('/laporan', LaporanController::class);
    Route::get('laporan-export-pdf',[LaporanController::class, 'generatePDF'])->name('laporan-export-pdf');
    Route::get('export/laporan',[LaporanController::class, 'exportData'])->name('export-laporan');
    Route::post('laporan/import',[LaporanController::class, 'importData'])->name('import-laporan');

});


//Login 
// Route::resource('/login', UserController::class);
Route::get('/login', [UserController::class, 'index']);
Route::post('/login/cek',[UserController::class, 'ceklogin']) ->name('ceklogin');
Route::get('/logout',[UserController::class, 'logout']) ->name('logout');

    