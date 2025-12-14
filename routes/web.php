<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda. Rute ini
| dimuat oleh RouteServiceProvider dalam grup yang berisi middleware "web".
|
*/

// Rute Halaman Utama (Dashboard)
Route::get('/', function () {
    // Ganti 'welcome' dengan nama view dashboard Mazer Anda
    return view('welcome'); 
});

// --- Rute CRUD SISTEM PERPUSTAKAAN ---

// 1. CRUD Anggota
// Menghasilkan rute untuk: index, create, store, show, edit, update, destroy
Route::resource('anggota', AnggotaController::class);

// 2. CRUD Buku (Katalog)
// Menghasilkan rute untuk: index, create, store, show, edit, update, destroy
Route::resource('buku', BukuController::class);

// 3. CRUD Peminjaman (Transaksi)
// Menghasilkan rute untuk: index, create, store, show, edit, update.
// Note: Kita tidak menggunakan 'destroy' karena kita menggunakan 'update' untuk mengubah status pengembalian.
Route::resource('peminjaman', PeminjamanController::class)->except(['destroy']);

// --- AUTH ROUTES (Harus Login dulu) ---
Route::middleware('auth')->group(function () {
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', function () {
        return view('welcome'); 
    })->name('dashboard');

    // Resource Controllers (CRUD)
    Route::resource('anggota', AnggotaController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('peminjaman', PeminjamanController::class)->except(['destroy']);
});
