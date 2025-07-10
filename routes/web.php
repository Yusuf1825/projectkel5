<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pemesanan
    Route::get('/pesan', [PesanController::class, 'index'])->name('pesan');
    Route::post('/pesan', [PesanController::class, 'store'])->name('pesan.store');

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
});

// ROUTE LAYANAN — Semua layanan di sini
Route::prefix('layanan')->group(function () {
    Route::view('/purwakarta', 'layanan.purwakarta')->name('layanan.purwakarta');     // Ganti dari antarkota
    Route::view('/bandung', 'layanan.bandung')->name('layanan.bandung');
    Route::view('/jakarta', 'layanan.jakarta')->name('layanan.jakarta');               // Tambahan baru
});

// ROUTE JADWAL — Semua jadwal di sini
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
Route::get('/jadwal/{id}', [JadwalController::class, 'show'])->name('detail');

require __DIR__ . '/auth.php';
