<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/transactions/cashier', [TransactionController::class, 'cashier'])->name('transactions.cashier');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/my-orders', [TransactionController::class, 'myOrders'])->name('transactions.my-orders');
    Route::get('/transactions/{transaction:invoice_number}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::get('/transactions/{transaction:invoice_number}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('/transactions/{transaction:invoice_number}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/transactions/{transaction:invoice_number}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
});