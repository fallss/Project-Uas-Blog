<?php
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\DashboardController;
use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\UserController;

use App\Http\Controllers\loginController;


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [LandingPageController::class, 'index']);

Route::middleware('auth')->group(function() {
Route::get('/dashboard',[DashboardController::class, 'index']);
Route::resource('article', ArticleController::class);
Route::resource('/categories', CategoryController::class)->only([
    'index',
   'store',
    'update',
    'destroy']);
});
Route::resource('users', UserController::class);


Route::middleware('throttle:10,1')->group(function () {
    Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [loginController::class, 'login']);
    Route::post('/logout', [loginController::class, 'logout'])->name('logout');
});

Route::get('/scan', function () {
    return view('scan');
})->name('scan.web.form');
