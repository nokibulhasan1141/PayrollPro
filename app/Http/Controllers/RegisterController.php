<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegisterForm()
    {
        // Make sure your Blade file is in resources/views/auth/register.blade.php
        return view('auth.register');
    }

    /**
     * Handle registration form submission
     */
    public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|min:6|confirmed',
        ]);

        // Save user in database with default role 'employee'
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'employee', // default role
        ]);

        // Redirect to login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
