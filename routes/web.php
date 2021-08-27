<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect('/products');
} );

Route::get('/products', [ProductController::class, 'index'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');

Route::get('/products/create', [ProductController::class, 'create'])->name('create');
Route::post('/products/create', [ProductController::class, 'store'])->name('store');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('update');

Route::delete('/products/{product}', [ProductController::class, 'delete'])->name('delete');
