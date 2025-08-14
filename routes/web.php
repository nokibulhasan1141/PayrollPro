<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RegisterController;

// Home page
Route::get('/', function () {
    return view('home');
});

// Payroll page
Route::get('/payroll', [PayrollController::class, 'index']);

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// Login page
Route::get('/login', function () {
    return view('auth.login'); // make sure login.blade.php is inside resources/views/auth
})->name('login');
