<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;

Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('dosens', DosenController::class);


// Route::get('/', function () {
//     return view('/dosens');
// });

Route::get('/', [DosenController::class, 'index'])->name('dosens.index'); // Menampilkan semua data

