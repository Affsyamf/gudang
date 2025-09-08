<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;


// Rute Halaman Utama (Publik)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Grup Rute yang membutuhkan Autentikasi (Dashboard dan lainnya)
// Untuk saat ini kita belum implementasi login, jadi kita kelompokkan saja
Route::middleware(['web'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Barang
    Route::resource('barangs', BarangController::class);

    // CRUD Supplier
    Route::resource('suppliers', SupplierController::class);

    // Transaksi
    Route::get('/transaksis', [TransaksiController::class, 'index'])->name('transaksis.index');
    Route::get('/transaksis/masuk', [TransaksiController::class, 'createMasuk'])->name('transaksi.createMasuk');
    Route::post('/transaksis/masuk', [TransaksiController::class, 'storeMasuk'])->name('transaksi.storeMasuk');
    Route::get('/transaksis/keluar', [TransaksiController::class, 'createKeluar'])->name('transaksi.createKeluar');
    Route::post('/transaksis/keluar', [TransaksiController::class, 'storeKeluar'])->name('transaksi.storeKeluar');

    // Rute untuk Cetak Laporan Transaksi
    Route::get('/transaksis/cetak', [TransaksiController::class, 'cetak'])->name('transaksis.cetak');

});