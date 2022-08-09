<?php

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
Route::prefix('dashboard')->middleware('auth')->as('dashboard.')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::view('users','dashboard.users')->name('users');
    });
    Route::middleware('role:user')->group(function () {
        Route::view('posts','dashboard.posts')->name('posts');
    });
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->name('index');
    Route::post('logout', [\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
});
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
