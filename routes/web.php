<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post:slug}/update', [PostController::class, 'update'])->name('posts.update');

    Route::resource('/category', CategoryController::class);

    Route::get('/{user:username}', [UserController::class, 'show'])->name('profile.show');
    Route::get('/{user:username}/edit-profile', [UserController::class, 'editProfile'])->name('profile.edit-profile');
    Route::patch('/{user:username}/update-profile', [UserController::class, 'updateProfile'])->name('profile.update-profile');
    Route::get('/{user:username}/edit-password', [UserController::class, 'editPassword'])->name('profile.edit-password');
    Route::patch('/{user:username}/update-password', [UserController::class, 'updatePassword'])->name('profile.update-password');
});
