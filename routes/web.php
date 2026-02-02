<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/expenses', function () {
        return view('admin.expenses.index');
    })->name('expenses.index');

    Route::get('/expenses/create', function () {
        return view('admin.expenses.create');
    })->name('expenses.create');

    Route::get('/categories', function () {
        return view('admin.categories.index');
    })->name('categories.index');

    Route::get('/reports', function () {
        return view('admin.reports.index');
    })->name('reports.index');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
});
