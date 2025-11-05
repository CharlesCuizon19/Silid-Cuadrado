<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectCategoriesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Admin Authentication
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/about-us', [PageController::class, 'about_us'])->name('about_us');
Route::get('/products', [PageController::class, 'products'])->name('products.show');
Route::get('/products/{id}', [PageController::class, 'product_details'])->name('products.details');
Route::get('/services', [PageController::class, 'services'])->name('services.show');
Route::get('/services/{id}', [PageController::class, 'service_details'])->name('services.details');
Route::get('/projects', [PageController::class, 'projects'])->name('projects.show');
Route::get('/projects/{id}', [PageController::class, 'project_details'])->name('projects.details');
Route::get('/contact-us', [PageController::class, 'contact_us'])->name('contact-us');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contacts.store');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('banners', BannerController::class);
    Route::resource('projectCategories', ProjectCategoriesController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('productCategories', ProductCategoriesController::class);
    Route::resource('products', ProductController::class);
    Route::resource('newsletters', NewsletterController::class);
    Route::resource('contacts', ContactUsController::class);


    Route::delete('/projects/image/{id}', [App\Http\Controllers\ProjectController::class, 'deleteImage'])
        ->name('projects.deleteImage');
    Route::delete('/projects/main-image/{id}', [App\Http\Controllers\ProjectController::class, 'deleteMainImage'])
        ->name('projects.deleteMainImage');

    Route::get('newsletter-export', [NewsletterController::class, 'export'])->name('newsletter.export');
    Route::get('contacts-export', [ContactUsController::class, 'export'])->name('contacts.export');
});
