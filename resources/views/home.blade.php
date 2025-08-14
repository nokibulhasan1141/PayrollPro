@extends('layouts.app')

@section('title', 'Welcome to PayrollPro')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center text-white d-flex align-items-center" style="height: 80vh;">
    <div class="container">
        <h1 class="display-4 fw-bold">Automate Your Payroll with Ease</h1>
        <p class="lead mb-4">Manage salaries, deductions, and employee records effortlessly with our professional payroll system.</p>
        <a href="/payroll" class="btn btn-primary btn-lg px-4 me-2">Get Started</a>
        <a href="#" class="btn btn-outline-light btn-lg px-4">Learn More</a>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose PayrollPro?</h2>
            <p class="text-muted">Streamline your payroll operations with these amazing features.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-box text-center p-4 shadow-sm bg-white rounded">
                    <i class="fas fa-calculator fa-3x text-primary mb-3"></i>
                    <h5 class="fw-bold">Automatic Calculations</h5>
                    <p>Say goodbye to manual calculations. Our system handles everything for you.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box text-center p-4 shadow-sm bg-white rounded">
                    <i class="fas fa-users fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold">Employee Management</h5>
                    <p>Store and manage all your employee details in one secure location.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box text-center p-4 shadow-sm bg-white rounded">
                    <i class="fas fa-file-invoice-dollar fa-3x text-warning mb-3"></i>
                    <h5 class="fw-bold">Payslip Generation</h5>
                    <p>Generate payslips instantly and share them with employees securely.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
