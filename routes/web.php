<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/{model}', function ($model) {
    return view('customizer', ['model' => $model]);
})->where('model', 'ps5|xbox')->name('customizer');

Route::post('cart/add', [\App\Http\Controllers\CartController::class, 'add'])->middleware('auth')->name('cart.add');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('checkout', [CheckoutController::class, 'show'])->name('checkout.index');
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('mis-ordenes', [OrderController::class, 'index'])->name('orders.index');
    Route::get('mis-ordenes/{order}', [OrderController::class, 'show'])->name('orders.show');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('ordenes', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('ordenes/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::put('ordenes/{order}/tracking', [AdminOrderController::class, 'updateTracking'])->name('orders.tracking');
    Route::put('ordenes/{order}/estado', [AdminOrderController::class, 'updateStatus'])->name('orders.status');
});
