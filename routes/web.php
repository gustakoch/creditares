<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/culture/{id}', [HomeController::class, 'culture'])->name('culture');

Route::get('/database/update', [HomeController::class, 'updateDatabase'])->name('database.update');
