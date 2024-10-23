<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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


Route::middleware('auth')->group(function() {
    Route::view('/', 'welcome')->name('home');
    Route::get('/', [DashboardController::class, 'index'])->name('home');
});

Route::get('logout', '\App\Http\Controllers\AuthController@logout');

Route::get('/Login', [AuthController::class, 'login'])->name('login');
Route::post('/Login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/Register', [AuthController::class, 'register'])->name('register');
Route::post('/Register', [AuthController::class, 'registerPost'])->name('register.post');
