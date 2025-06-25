<?php

use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('home');
})->name('home');

// CRUD completo de categorías
Route::resource('categories', CategoryController::class);

// CRUD completo de productos
Route::resource('products', ProductController::class);
