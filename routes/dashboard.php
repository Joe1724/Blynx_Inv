<?php

use App\Http\Controllers\Dashboard\{UserController, CategoryController, OrderController, OrderItemController, ProductController};
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// User Routes (General or Authenticated Users)
Route::group([], function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('index'); // Calls the DashboardController@index method

    Route::resource('categories', CategoryController::class)
        ->except(['show']);

    Route::resource('products', ProductController::class);
});

# Admin Routes (Only for Admin Users)
Route::middleware('admin')
    ->group(function () {
        Route::resource('users', UserController::class);

        // Orders and Order Items Routes
        Route::get('orders/{order}/order-items', [OrderController::class, 'orderItems'])
            ->name('orders.orderItems');
        Route::resource('orders', OrderController::class);
        Route::resource('order-items', OrderItemController::class);
    });
