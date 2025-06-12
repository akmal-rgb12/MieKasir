<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\siteController::class, 'index'])->name('landings.index');
Route::get('/catalog', [App\Http\Controllers\siteController::class, 'products'])->name('catalog');
Route::get('/checkout', [App\Http\Controllers\siteController::class, 'checkout'])->name('checkout');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

