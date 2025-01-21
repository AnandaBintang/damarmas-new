<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'homepage'])->name('homepage');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
Route::get('/shop/search', [ProductController::class, 'search'])->name('shop.search');
Route::get('/shop/price', [ProductController::class, 'filterByPrice'])->name('shop.price');
Route::get('/shop/{product}', [ProductController::class, 'show'])->name('product-detail');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
