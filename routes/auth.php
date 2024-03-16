<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//The custom route files need to be registered in the RouteServiceProvider file
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
