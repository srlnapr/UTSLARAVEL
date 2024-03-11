<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|gi
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index']);

// Rute untuk pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/tambahpelanggan', [PelangganController::class, 'tambahpelanggan']);
Route::post('/pelanggan', [PelangganController::class, 'pelanggan']); // Mengubah menjadi POST request untuk menambahkan data pelanggan
Route::get('/pelanggan/{pelanggan_id}', [PelangganController::class, 'show']);
Route::get('/pelanggan/{pelanggan_id}/edit', [PelangganController::class, 'edit']);
Route::put('/pelanggan/{pelanggan_id}', [PelangganController::class, 'update']);
<<<<<<< HEAD

=======
>>>>>>> e72d7d3dd7b504a526e0818a3bd8d80d8f7b5375
Route::delete('/pelanggan/{pelanggan_id}', [PelangganController::class, 'destroy']); // untuk mengupdate data berdasarkan id tertentu