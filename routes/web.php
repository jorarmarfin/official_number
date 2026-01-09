<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('welcome');
Route::post('/solicitud', [\App\Http\Controllers\HomeController::class,'store'])->name('solicitud.store');
