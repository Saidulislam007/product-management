<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

// Sorting and search routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
