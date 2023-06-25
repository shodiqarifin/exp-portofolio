<?php

use App\Http\Controllers\auth\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return "selamat datang " . Auth::user()->name . " di halaman admin";
})->middleware('auth');

// custom file route
require __DIR__ . '/auth.php';
