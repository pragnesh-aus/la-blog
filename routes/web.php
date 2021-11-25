<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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

//home page
Route::get('/', function () {
    return view('home');
})->name('home');

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

//logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// post
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// post like
//Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::post('/posts/{post}/likes', [\App\Http\Controllers\PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [\App\Http\Controllers\PostLikeController::class, 'destroy'])->name('posts.likes');

// User Post List
Route::get('/users/{user:username}/posts', [\App\Http\Controllers\UserPostController::class, 'index'])->name('users.posts');
