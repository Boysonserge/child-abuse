<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dash');
});

Route::middleware('splade')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    require __DIR__.'/auth.php';
});
