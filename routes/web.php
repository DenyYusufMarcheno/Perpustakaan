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

// Rute Authentication (Login & Logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Halaman Utama (Dashboard) - Memerlukan autentikasi
Route::get('/', function () {
    return view('welcome'); 
})->middleware('auth')->name('dashboard');

// --- Rute CRUD SISTEM PERPUSTAKAAN (Protected by Authentication & Role) ---

// Group untuk Admin dan Petugas - Full CRUD access
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    
    // 1. CRUD Anggota - Hanya Admin dan Petugas
    Route::resource('anggota', AnggotaController::class);
    
    // 2. CRUD Buku (Katalog) - Hanya Admin dan Petugas
    Route::resource('buku', BukuController::class);
    
    // 3. CRUD Peminjaman (Transaksi) - Hanya Admin dan Petugas
    Route::resource('peminjaman', PeminjamanController::class)->except(['destroy']);
});

// Group untuk semua authenticated users (dapat melihat daftar)
Route::middleware(['auth'])->group(function () {
    // Anggota dapat melihat daftar buku
    Route::get('buku-list', [BukuController::class, 'index'])->name('buku.list');
});