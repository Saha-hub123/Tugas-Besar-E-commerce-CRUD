<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    route::get('/dashboard', [UserController::class, 'Dashboard'])->name('dashboard');
    route::get('/user', [UserController::class, 'User'])->name('user');
    route::get('/user/{product}/beli', [UserController::class, 'beli'])->name('beli');
    route::get('/admin', [ProductController::class, 'index'])->name('products.index');
    route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    route::post ('/products', [ProductController::class, 'store'])->name('products.store');
    route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
