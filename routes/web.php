<?php

use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('pelanggan.index'));
Route::resource('pelanggan', PelangganController::class)->except('show');
Route::view('/layanan', 'layanan.index');
Route::view('/mesin', 'mesin.index');
Route::view('/bahan', 'bahan.index');