<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;


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


use App\Http\Controllers\ContactController;

Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


use App\Http\Controllers\HRLeaveController;

Route::prefix('hr')->group(function () {
    Route::get('/', [HRLeaveController::class, 'index'])->name('hr.index');
    Route::get('/employee/{id}', [HRLeaveController::class, 'show'])->name('hr.show');
    Route::post('/leave/{id}/approve', [HRLeaveController::class, 'approve'])->name('hr.approve');
    Route::post('/leave/{id}/reject', [HRLeaveController::class, 'reject'])->name('hr.reject');
});
use App\Http\Controllers\EmployeeController;

Route::middleware('auth')->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/employee/leave-request', [EmployeeController::class, 'requestForm'])->name('employee.leave.request');
    Route::post('/employee/leave-request', [EmployeeController::class, 'submitLeave'])->name('employee.leave.submit');
});
use Illuminate\Support\Facades\Auth;

Route::post('/login', function(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/employee/dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('login.post');

