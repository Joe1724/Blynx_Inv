<?php

use App\Http\Controllers\Dashboard\{
    UserController,
    CategoryController,
    OrderController,
    OrderItemController,
    ProductController
};
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// General User Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard Route - Restricted for moderators
    Route::get('/', [DashboardController::class, 'index'])
        ->name('index')
        ->middleware('preventModerator'); // Add middleware here

    // Categories and Products
    Route::resource('categories', CategoryController::class)
        ->except(['show']);
    Route::resource('products', ProductController::class);
});

// Moderator and Admin Routes
Route::middleware(['auth', 'moderator'])->group(function () {
    // Orders and Order Items Routes
    Route::get('orders/{order}/order-items', [OrderController::class, 'orderItems'])->name('orders.orderItems');
    Route::resource('orders', OrderController::class);
    Route::resource('order-items', OrderItemController::class);
});

// Admin-Only Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'prevent.moderator.dashboard'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});
