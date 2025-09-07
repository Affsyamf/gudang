<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('barangs', BarangController::class);
Route::resource('suppliers', SupplierController::class);

// Rute KHUSUS untuk Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show');

Route::get('/transaksi/masuk/create', [TransaksiController::class, 'createMasuk'])->name('transaksi.createMasuk');
Route::post('/transaksi/masuk', [TransaksiController::class, 'storeMasuk'])->name('transaksi.storeMasuk');

Route::get('/transaksi/keluar/create', [TransaksiController::class, 'createKeluar'])->name('transaksi.createKeluar');
Route::post('/transaksi/keluar', [TransaksiController::class, 'storeKeluar'])->name('transaksi.storeKeluar');