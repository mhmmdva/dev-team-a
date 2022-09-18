<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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



Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    // Route::prefix('dashboard')->controller(DashboardController::class)->name('dashboard.')->group(function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/create', 'create')->name('create');
    //     Route::post('/', 'store')->name('store');
    // });

    Route::prefix('users')->controller(UserController::class)->name('profile.')->group(function () {
        Route::get('/about', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/show', 'showList')->name('show-list');
        Route::get('/{user:username}', 'showProfile')->name('show-profile');
        Route::get('/{user:username}/edit-profile', 'editProfile')->name('edit-profile');
        Route::patch('/{user:username}/update-profile', 'updateProfile')->name('update-profile');
        Route::get('/{user:username}/edit-password', 'editPassword')->name('edit-password');
        Route::patch('/{user:username}/update-password', 'updatePassword')->name('update-password');
    });


    Route::prefix('posts')->controller(PostController::class)->name('posts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        //Route::get('/show', 'show')->name('show');
        Route::get('/{post:slug}/edit', 'edit')->name('edit');
        Route::patch('/{post:slug}/update', 'update')->name('update');
        //Route::delete('/{posts}', 'destroy')->name('destroy');
    });

    Route::prefix('tags')->controller(TagController::class)->name('tags.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{tag}', 'show')->name('show');

        //Route::get('/{tags}/edit', 'edit')->name('edit');
        //Route::patch('/{tags}', 'update')->name('update');
        //Route::delete('/{tags}', 'destroy')->name('destroy');
    });

    Route::resource('/category', CategoryController::class);
});

require __DIR__ . '/auth.php';
