<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RouteMiddleware;
use App\Http\Controllers\CategroyController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('post.detail');
Route::get('/tag/{slug}', [PostController::class, 'postByTag'])->name('post.tags');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/category', CategroyController::class);
Route::resource('/post', PostController::class);
Route::resource('/tag', tagController::class);

//Profile Controller
Route::get('/profile/{id}/edit', [HomeController::class, 'profile']);
Route::post('/profile/{id}', [HomeController::class, 'update']);

//User Controller
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/add', [UserController::class, 'create'])->name('user.created');
Route::post('/user/store', [UserController::class, 'store'])->name('user.stored');
Route::get('/user/{role}/{user_id}', [UserController::class, 'roleEdit'])->name('user.role.edit')->middleware(RouteMiddleware::class);