<?php

use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PesananController;

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
    return view('welcome');
})->name('dashboard');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
    Route::get('/admin/pesanan', [PesananController::class, 'admin_index'])->name('adminpesanan.index');
    Route::resource('admin/paket_wisata', PaketWisataController::class);
});

// pesanan
Route::resource('pesanan', PesananController::class);
Route::get('/export-pdf', [PesananController::class, 'exportPdf']);

// rangkuman reservasi
Route::get('/rangkuman-reservasi/{id}', [PesananController::class, 'rangkumanReservasi'])->name('rangkuman_reservasi');

// download pdf
Route::get('/pesanan/download/pdf', [PesananController::class, 'downloadPdf'])->name('pesanan.download.pdf');








