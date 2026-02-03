<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Expense Routes
    Route::resource('expenses', \App\Http\Controllers\Admin\ExpenseController::class);
    Route::resource('expense-categories', \App\Http\Controllers\Admin\ExpenseCategoryController::class);

    // Categories CRUD Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/reports', function () {
        return view('admin.reports.index');
    })->name('reports.index');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
});
