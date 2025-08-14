@extends('layouts.app')

@section('title', 'Login - PayrollPro')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 400px;">
        <div class="card-body p-4">
            <h2 class="text-center fw-bold mb-4">Login</h2>
            
            <form method="POST" action="#">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email address</label>
                    <input type="email" id="email" name="email" class="form-control rounded-pill" placeholder="Enter your email" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" id="password" name="password" class="form-control rounded-pill" placeholder="Enter your password" required>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember" class="ms-1">Remember Me</label>
                    </div>
                    <a href="#" class="text-decoration-none small">Forgot Password?</a>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Login</button>
            </form>
            
            
            <div class="text-center mt-3">
                <p class="mb-0 small">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Register</a></p>
            </div>
        </div>
    </div>
</div>
@endsection

