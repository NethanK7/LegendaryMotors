<?php

use Illuminate\Support\Facades\Route;
use Controllers\HomeController;
use Controllers\InventoryController;
use Controllers\ContactController;
use Controllers\AboutController;
use Controllers\CheckoutController;

use Controllers\AuthController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::get('/cars/{id}', [InventoryController::class, 'show'])->name('cars.show');
Route::get('/how-to-buy', [AboutController::class, 'index'])->name('about'); 
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/checkout/{car_id?}', [CheckoutController::class, 'index'])->name('checkout');

// Auth Routes
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Payment Routes
Route::get('/payment/checkout', [App\Http\Controllers\PaymentController::class, 'checkout'])->name('payment.checkout');
Route::get('/payment/success', [App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');

// Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/favorites', [App\Http\Controllers\FavoritesController::class, 'index'])->name('favorites.index');
    
    // Admin Routes
    Route::middleware(['mid' => 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('cars', App\Http\Controllers\Admin\CarController::class);
    });
});
