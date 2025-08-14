@extends('layouts.app')

@section('title', 'Register - PayrollPro')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0 rounded-4" style="width: 450px;">
        <div class="card-body p-4">
            <h2 class="text-center fw-bold mb-4">Create an Account</h2>
            
            <!-- Register Form -->
            <form method="POST" action="{{ route('register.post') }}">


                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control rounded-pill" placeholder="Enter your full name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control rounded-pill" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" id="password" name="password" class="form-control rounded-pill" placeholder="Enter your password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control rounded-pill" placeholder="Confirm your password" required>
                </div>

                <button type="submit" class="btn btn-success w-100 rounded-pill py-2">Register</button>
            </form>

            <!-- Already Have Account Link -->
            <div class="text-center mt-3">
                <p class="mb-0 small">Already have an account? 
                    <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
