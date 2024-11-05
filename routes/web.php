<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategroyController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/category', CategroyController::class);
Route::resource('/post', PostController::class);
Route::resource('/tag', tagController::class);