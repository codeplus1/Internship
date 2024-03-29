<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\BaseController as ControllersBaseController;
use App\Http\Controllers\frontend\BaseController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'user'])->group(function () {
    // Route::get('/home', function () {
    //     return view('frontend.home');
    // })->name('home');
    Route::get('/home',[ControllersBaseController::class,'home'])->name('frontend.home');
    Route::resource('Inventory', InventoryController::class);
    Route::resource('Product',ProductController::class);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::get('users/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
    Route::post('users/{id}/restore', [UserController::class, 'restore'])->name('user.restore.post');
    Route::get('alluser', [UserController::class,'alluser' ])->name('alluser');
});
