<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\DashboardController;
use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Back\CategoryController; // Add this line



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/dashboard',[DashboardController::class, 'index']);

Route::resource('/categories', CategoryController::class)->only([
    'index',
   'store',
    'update',
    'destroy']);

Route::resource('article', ArticleController::class);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => [ 'guest']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});