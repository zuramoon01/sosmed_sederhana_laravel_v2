<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

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

Route::view('/', 'index', ['posts' => Post::all()])->middleware('auth')->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'add');
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'verify');
    });
    Route::get('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(PostController::class)
        ->prefix('/posts')->group(function () {
            Route::post('/', 'create');
            Route::delete('/{post:id}', 'destroy');
        });
});
