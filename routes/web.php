<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

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

Route::get('/', function () {
    return view('main');
});

Route::get('/voucher/{code}', [App\Http\Controllers\VoucherController::class, 'show'])
    ->name('voucher.show');

    
Route::post('/send-form', [GuestController::class, 'store'])->name('send.form');

