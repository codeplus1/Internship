<?php

use App\Http\Controllers\admin\UserController;
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
    Route::get('/home', function () {
        return view('frontend.home');
    })->name('home');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('user', UserController::class);
    Route::get('users/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
    Route::post('users/{id}/restore', [UserController::class, 'restore'])->name('user.restore.post');
    Route::get('alluser', [UserController::class,'alluser' ])->name('alluser');
});
