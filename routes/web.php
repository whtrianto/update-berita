<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('home');

// Admin resources (simple, no auth middleware yet)
Route::resource('posts', PostController::class)->except(['show']);
Route::resource('categories', CategoryController::class)->except(['show']);
Route::resource('tags', TagController::class)->except(['show']);

// Public routes
Route::get('/p/{slug}', [PublicController::class, 'post'])->name('public.post');
Route::get('/category/{slug}', [PublicController::class, 'category'])->name('public.category');
Route::get('/tag/{slug}', [PublicController::class, 'tag'])->name('public.tag');
