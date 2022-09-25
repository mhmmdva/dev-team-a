<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');

    Route::get('forgot-password', [ForgotPasswordController::class, 'showForgetPassword'])->name('forgot.password');
    Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgetPassword'])->name('forgot.password.post');

    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPassword'])->name('reset.password');
    Route::post('reset-password', [ResetPasswordController::class, 'submitResetPassword'])->name('reset.password.post');

    Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

    Route::get('/auth/github', [GithubController::class, 'redirectToGithub'])->name('login.github');
    Route::get('/auth/github/callback', [GithubController::class, 'handleGithubCallback']);
});
