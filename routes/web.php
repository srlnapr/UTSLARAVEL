<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;

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
    return view('pages.Landingpage');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Rute khusus admin untuk pelanggan
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/tambahpelanggan', [PelangganController::class, 'tambahpelanggan']);
    Route::post('/pelanggan', [PelangganController::class, 'pelanggan']); // Mengubah menjadi POST request untuk menambahkan data pelanggan
    Route::get('/pelanggan/{pelanggan_id}', [PelangganController::class, 'show']);
    Route::get('/pelanggan/{pelanggan_id}/edit', [PelangganController::class, 'edit']);
    Route::put('/pelanggan/{pelanggan_id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/{pelanggan_id}', [PelangganController::class, 'destroy']); // untuk mengupdate data berdasarkan id tertentu
});

// Rute hewan untuk semua user yang terautentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/hewan', [HewanController::class, 'index']);
    Route::get('/tambahhewan', [HewanController::class, 'tambahHewan']);
    Route::post('/hewan', [HewanController::class, 'simpanHewan']);
    Route::get('/hewan/{hewan_id}', [HewanController::class, 'show']);
    Route::get('/hewan/{hewan_id}/edit', [HewanController::class, 'edit']);
    Route::put('/hewan/{hewan_id}', [HewanController::class, 'update']);
    Route::delete('/hewan/{hewan_id}', [HewanController::class, 'destroy']);
});

// Rute kategori untuk semua user yang terautentikasi
Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class);
});

Auth::routes();

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
