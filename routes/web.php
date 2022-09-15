<?php

use App\Http\Controllers\AuthController;
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

Route::view('/', 'index')->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'add');
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'verify');
    });
    Route::get('/logout', 'logout')->middleware('auth')->name('logout');
});
