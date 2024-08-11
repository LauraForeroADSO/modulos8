<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrosController;


Route::get('/', [RegistrosController::class, 'index'])->name('home');
Route::post('/store', [RegistrosController::class, 'store'])->name('myStore');
Route::get('/registros/show/{id}', [RegistrosController::class, 'show'])->name('myShow');
Route::delete('/registros/delete/{id}', [RegistrosController::class, 'destroy'])->name('myDestroy');
Route::get('/registros/edit/{id}', [RegistrosController::class, 'edit'])->name('myEdit');
Route::put('/registros/update/{id}', [RegistrosController::class, 'update'])->name('myUpdate');
Route::view('nosotros', 'nosotros')->name('nosotros');
Route::view('servicios', 'servicios')->name('servicios');
