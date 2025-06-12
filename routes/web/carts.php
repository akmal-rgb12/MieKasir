<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::post('carts', [CartController::class, 'storeToTransaction']);
    Route::post('carts/add', [CartController::class, 'addToCart']);
    Route::get('carts/count', [CartController::class, 'getCartCount']);
    Route::get('carts/items', [CartController::class, 'getCartItems']);
});
