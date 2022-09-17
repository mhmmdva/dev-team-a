<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
   Route::get('/login', [LoginController::class, 'index'])->name('login');
   Route::get('/register', [RegisterController::class, 'index'])->name('register');
});
