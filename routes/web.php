<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/about-us', [PageController::class, 'about_us'])->name('about_us');
Route::get('/products', [PageController::class, 'products'])->name('products');
