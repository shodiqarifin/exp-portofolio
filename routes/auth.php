<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/logout', 'logout')->name('logout')->middleware('auth');

    Route::middleware('guest')->group(function () {
        Route::get('/auth', 'login')->name('login');
        Route::get('/auth/redirect', 'redirect');
        Route::get('/auth/callback', 'callback');
    });
});

Route::redirect('home', '/dashboard');
