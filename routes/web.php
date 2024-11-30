<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\OrderItemController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')
    ->group(function () {
        Route::redirect('/', '/login');

        Route::get('login', [LoginController::class, 'index'])->name('login');
        Route::post('login', [LoginController::class, 'store'])->name('login.store');
    });

Route::post('logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

    Route::resource('order-items', OrderItemController::class)->names('dashboard.order-items');
    Route::get('/get-products/{categoryId}', [OrderItemController::class, 'getProductsByCategory']);


