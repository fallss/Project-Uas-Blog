<?php
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\DashboardController;
use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\VirusScanController;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\HomeController;


Route::get('/', [LandingPageController::class, 'index']);

Route::post('/articles/search', [HomeController::class, 'index'])->name('search');

Route::middleware('auth')->group(function() {
Route::get('/dashboard',[DashboardController::class, 'index']);
Route::resource('/categories', CategoryController::class)->only([
    'index',
    'store',
    'update',
    'destroy']);

    Route::resource('article', ArticleController::class);
    Route::resource('/users', UserController::class);
    Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Route::get('/scan-virus', [VirusScanController::class, 'index'])->name('scan-virus.index');
Route::post('/scan-virus', [VirusScanController::class, 'scan'])->name('scan-virus');
Route::post('/clean-virus', [VirusScanController::class, 'clean'])->name('clean-virus');

Route::resource('users', UserController::class);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => [ 'guest']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::middleware('throttle:10,1')->group(function () {
    Route::get('/register', [RegisterController::class, 'showLoginForm'])->name('register');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/login-histories', [App\Http\Controllers\Admin\LoginHistoryController::class, 'index'])->name('admin.login_histories.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

