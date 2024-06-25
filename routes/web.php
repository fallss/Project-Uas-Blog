<?php
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\CategoryController; // Add this line
use App\Http\Controllers\Back\UserController;

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\LandingPageController;



// Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

// Route::get('/', [LandingPageController::class, 'index']);

Route::get('/', [HomeController::class, 'index']);



Route::middleware('auth')->group(function() {
    Route::get('/dashboard',[DashboardController::class, 'index']);

    Route::resource('/categories', CategoryController::class)->only([
    'index',
   'store',
    'update',
    'destroy'])->middleware('UserAccess:1');

    Route::resource('article', ArticleController::class);

    Route::resource('/users', UserController::class);

    Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');