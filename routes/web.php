<?php

use App\Http\Controllers\RsvpController;
use App\Http\Controllers\VoucherScanController;
use App\Http\Controllers\VoucherRedeemController; // <-- TAMBAHKAN INI
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*Route::get('/', function () {
    return view('main');
});

Route::get('/test', function () {
    return view('test');
});*/

//test send data from main
Route::get('/', [RsvpController::class, 'index'])->name('main');
Route::post('/', [RsvpController::class, 'store'])->name('rsvp.store');
//eo test send data

/*

// Halaman RSVP untuk Tamu
Route::get('/rsvp', [RsvpController::class, 'index'])->name('rsvp.index');
Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');
// Halaman Dashboard (contoh)

*/

Route::get('/dashboard', [App\Http\Controllers\GuestController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Guest CRUD routes
Route::middleware(['auth'])->group(function () {
    Route::get('/guests/create', [App\Http\Controllers\GuestController::class, 'create'])->name('guests.create');
    Route::post('/guests', [App\Http\Controllers\GuestController::class, 'store'])->name('guests.store');
    Route::get('/guests/{guest}', [App\Http\Controllers\GuestController::class, 'show'])->name('guests.show');
    Route::get('/guests/{guest}/edit', [App\Http\Controllers\GuestController::class, 'edit'])->name('guests.edit');
    Route::put('/guests/{guest}', [App\Http\Controllers\GuestController::class, 'update'])->name('guests.update');
    Route::delete('/guests/{guest}', [App\Http\Controllers\GuestController::class, 'destroy'])->name('guests.destroy');
});

// Halaman Scanner dan API untuk Staf Merchandise (Wajib Login)
Route::middleware(['auth'])->group(function () {

    // Rute Halaman Scanner
    Route::get('/admin/voucher/scan', [
        VoucherScanController::class,
        'index'
    ])->name('voucher.scan');

    // API Endpoint untuk memvalidasi QR Code
    // Dipindahkan dari api.php agar bisa menggunakan session auth ('web')
    Route::post('/voucher/redeem', [
        VoucherRedeemController::class,
        'redeem'
    ])->name('voucher.redeem');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Autentikasi Bawaan Breeze (biarkan di top level)
require __DIR__ . '/auth.php';

Route::get('/voucher/{code}', [App\Http\Controllers\VoucherController::class, 'show'])
    ->name('voucher.show');
