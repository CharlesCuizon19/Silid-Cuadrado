<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/about-us', [PageController::class, 'about_us'])->name('about_us');
Route::get('/products', [PageController::class, 'products'])->name('products.show');
Route::get('/products/{id}', [PageController::class, 'product_details'])->name('products.details');
Route::get('/services', [PageController::class, 'services'])->name('services.show');
Route::get('/services/{id}', [PageController::class, 'service_details'])->name('services.details');
