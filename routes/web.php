<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kelola_DataSiswa;
use App\Http\Controllers\Kelola_DataSiswaController;
use App\Http\Controllers\Kelola_KategoriController;
use App\Http\Controllers\Kelola_PenggunaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Transaksi_UangKeluarController;
use App\Http\Controllers\Transaksi_UangMasukController;
use App\Http\Controllers\Transaksi_UangSekolahController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['checkrole:1'])->group(function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('staff.dashboard');
        // kelola kategori
        Route::get('/Kelola-kategori',[Kelola_KategoriController::class, 'index'])->name('admin.kategori.index');
        Route::post('/Kelola-kategori',[Kelola_KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::get('/Kelola-kategori/edit/{id}',[Kelola_KategoriController::class, 'edit'])->name('admin.kategori.edit');
        Route::put('/Kelola-kategori/update/{id}',[Kelola_KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/Kelola-kategori/delete/{id}',[Kelola_KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
        // kelola pengguna
        Route::get('/Kelola-pengguna',[Kelola_PenggunaController::class, 'index'])->name('admin.kelola-pengguna.index');
        Route::post('/Kelola-pengguna',[Kelola_PenggunaController::class, 'store'])->name('admin.kelola-pengguna.store');
        Route::get('/Kelola-pengguna/edit/{id}',[Kelola_PenggunaController::class, 'edit'])->name('admin.kelola-pengguna.edit');
        Route::put('/Kelola-pengguna/update/{id}',[Kelola_PenggunaController::class, 'update'])->name('admin.kelola-pengguna.update');
        Route::delete('/Kelola-pengguna/delete/{id}',[Kelola_PenggunaController::class, 'destroy'])->name('admin.kelola-pengguna.destroy');

        // Kelola Data Siswa
        Route::get('/Kelola-Data-Siswa',[Kelola_DataSiswaController::class, 'index'])->name('admin.kelola-siswa.index');
        Route::get('/Kelola-Data-Siswa/cek-nik',[Kelola_DataSiswaController::class, 'cekNik'])->name('admin.kelola-siswa.cekNik');
        Route::post('/Kelola-Data-Siswa',[Kelola_DataSiswaController::class, 'store'])->name('admin.kelola-siswa.store');
        Route::get('/Kelola-Data-Siswa/data/{id}',[Kelola_DataSiswaController::class, 'data'])->name('admin.kelola-siswa.data');
        Route::put('/Kelola-Data-Siswa/update/{id}',[Kelola_DataSiswaController::class, 'update'])->name('admin.kelola-siswa.update');
        Route::delete('/Kelola-Data-Siswa/delete/{id}',[Kelola_DataSiswaController::class, 'destroy'])->name('admin.kelola-siswa.destroy');

        // Laporan
        Route::get('/Laporan',[LaporanController::class, 'index'])->name('admin.laporan.index');

        Route::get('/Transaksi/uang-masuk',[Transaksi_UangMasukController::class, 'index'])->name('admin.uangmasuk.index');
        Route::post('/Transaksi/uang-masuk',[Transaksi_UangMasukController::class, 'store'])->name('admin.uangmasuk.store');
        Route::get('/Transaksi/uang-masuk/data/{id}',[Transaksi_UangMasukController::class, 'data'])->name('admin.uangmasuk.data');
        Route::put('/Transaksi/uang-masuk/update/{id}',[Transaksi_UangMasukController::class, 'update'])->name('admin.uangmasuk.update');
        Route::delete('/Transaksi/uang-masuk/delete/{id}',[Transaksi_UangMasukController::class, 'destroy'])->name('admin.uangmasuk.destroy');


        Route::get('/Transaksi/uang-keluar',[Transaksi_UangKeluarController::class, 'index'])->name('admin.uangkeluar.index');
        Route::post('/Transaksi/uang-keluar',[Transaksi_UangKeluarController::class, 'store'])->name('admin.uangkeluar.store');
        Route::get('/Transaksi/uang-keluar/data/{id}',[Transaksi_UangKeluarController::class, 'data'])->name('admin.uangkeluar.data');
        Route::put('/Transaksi/uang-keluar/update/{id}',[Transaksi_UangKeluarController::class, 'update'])->name('admin.uangkeluar.update');
        Route::delete('/Transaksi/uang-keluar/delete/{id}',[Transaksi_UangKeluarController::class, 'destroy'])->name('admin.uangkeluar.destroy');

        Route::get('/Transaksi/uang-sekolah',[Transaksi_UangSekolahController::class, 'index'])->name('admin.uangsekolah.index');
        Route::post('/Transaksi/uang-sekolah',[Transaksi_UangSekolahController::class, 'store'])->name('admin.uangsekolah.store');
        Route::get('/Transaksi/uang-sekolah/data/{id}',[Transaksi_UangSekolahController::class, 'data'])->name('admin.uangsekolah.data');
        Route::put('/Transaksi/uang-sekolah/update/{id}',[Transaksi_UangSekolahController::class, 'update'])->name('admin.uangsekolah.update');
        Route::delete('/Transaksi/uang-sekolah/delete/{id}',[Transaksi_UangSekolahController::class, 'destroy'])->name('admin.uangsekolah.destroy');
        Route::get('/get-kelas/siswa/{kelas}',[Transaksi_UangSekolahController::class, 'getkelas'])->name('admin.uangsekolah.getkelas');
    });




    // //Menu Transaksi
    // Route::get('/transaksi/uang-masuk', function () {
    //     return view('Admin.Transaksi.Uang-Masuk.index');
    // })->name('uang-masuk.index');
    // Route::get('/transaksi/uang-keluar', function () {
    //     return view('Admin.Transaksi.Uang-Keluar.index');
    // })->name('uang-keluar.index');
    // Route::get('/transaksi/uang-sekolah', function () {
    //     return view('Admin.Transaksi.Uang-Sekolah.index');
    // })->name('uang-sekolah.index');


    // Route::get('/kelola-pengguna', function () {
    //     return view('Admin.Kelola_pengguna.index');
    // })->name('kelola-pengguna.index');

    // Route::get('/laporan', function () {
    //     return view('Admin.Laporan.index');
    // })->name('laporan.index');

    // Route::get('/kelola-data-siswa', function () {
    //     return view('Admin.Kelola-Siswa.index');
    // })->name('kelola-data-siswa.index');

    // Route::get('/kategori', function () {
    //     return view('Admin.Kategori.index');
    // })->name('kategori.index');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
