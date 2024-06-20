<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\CategoryController; 
use App\Http\Controllers\loginController;

use App\Http\Controllers\Back\UserController;


Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::get('/', [LandingPageController::class, 'index']);

Route::middleware('auth')->group(function() {
    Route::get('/dashboard',[DashboardController::class, 'index']);

    Route::resource('/categories', CategoryController::class)->only([
    'index',
   'store',
    'update',
    'destroy']);

Route::resource('article', ArticleController::class);

    Route::resource('/users', UserController::class);

});


