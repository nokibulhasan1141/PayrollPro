@extends('layouts.app')

@section('title', 'Employee Dashboard - PayrollPro')

@section('content')
<div class="container mt-5">

    <!-- Welcome Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Welcome, {{ $employee->name }}</h2>
        <a href="{{ route('employee.leave.request') }}" class="btn btn-success">
            <i class="fa fa-plus me-2"></i>Request Leave
        </a>
    </div>

    <!-- Row 1: Salary + Attendance Summary -->
    <div class="row mb-4">
        <!-- Salary Card -->
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">Latest Salary</div>
                <div class="card-body">
                    <p><strong>Amount:</strong> ${{ $latestPayroll->amount ?? '0.00' }}</p>
                    <p><strong>Paid on:</strong> {{ $latestPayroll->payment_date ?? 'N/A' }}</p>
                    <p><strong>Deductions:</strong> ${{ $latestPayroll->deductions ?? '0.00' }}</p>
                    <p><strong>Month:</strong> {{ $latestPayroll->month ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Attendance Summary -->
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white fw-bold">Attendance Summary</div>
                <div class="card-body d-flex justify-content-between">
                    <span><strong>Present:</strong> {{ $attendance['present'] ?? 0 }}</span>
                    <span><strong>Absent:</strong> {{ $attendance['absent'] ?? 0 }}</span>
                    <span><strong>Late:</strong> {{ $attendance['late'] ?? 0 }}</span>
                    <span><strong>%:</strong> {{ $attendance['percentage'] ?? 0 }}%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2: Announcements -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-warning fw-bold">Company Announcements</div>
        <div class="card-body">
            @forelse($announcements as $announcement)
                <p>📢 <strong>{{ $announcement->title }}</strong> - {{ $announcement->description }}</p>
            @empty
                <p class="text-muted">No announcements available.</p>
            @endforelse
        </div>
    </div>

    <!-- Row 3: Leave Summary -->
    <div class="row mb-5">
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Approved Leaves</h5>
                    <p class="display-6 fw-bold text-success">{{ $leaves->where('status','approved')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Pending Leaves</h5>
                    <p class="display-6 fw-bold text-warning">{{ $leaves->where('status','pending')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Rejected Leaves</h5>
                    <p class="display-6 fw-bold text-danger">{{ $leaves->where('status','rejected')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Leave Requests Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white fw-bold">My Leave Requests</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Type</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaves as $leave)
                    <tr>
                        <td>{{ $leave->start_date }}</td>
                        <td>{{ $leave->end_date }}</td>
                        <td>{{ $leave->type }}</td>
                        <td>
                            @if($leave->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($leave->status == 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No leave requests found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
