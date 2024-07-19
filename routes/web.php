<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('dashboard');
Route::get('/form-create-lob', [MainController::class, 'createLob'])->name('create');
Route::post('/store-lob', [MainController::class, 'storeLob'])->name('store');
