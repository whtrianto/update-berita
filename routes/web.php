<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;

Route::get('/', [PublicController::class, 'home'])->name('home');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin resources (protected)
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('tags', TagController::class)->except(['show']);
    Route::resource('users', AdminUserController::class)->except(['show']);
});

// Public routes
Route::get('/p/{slug}', [PublicController::class, 'post'])->name('public.post');
Route::get('/category/{slug}', [PublicController::class, 'category'])->name('public.category');
Route::get('/tag/{slug}', [PublicController::class, 'tag'])->name('public.tag');
