@extends('layouts.app')

@section('title', 'Employee Leave Details - PayrollPro')

@section('content')
<div class="container mt-5">
    <h2 class="text-2xl fw-bold mb-6">Leave Calendar - {{ $user->name }}</h2>

    <div class="table-responsive">
        <table class="table table-striped shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user->leaves as $leave)
                <tr class="hover-bg-light">
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
                    <td class="d-flex gap-2">
                        @if($leave->status == 'pending')
                            <form action="{{ route('hr.approve', $leave->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm">Approve</button>
                            </form>
                            <form action="{{ route('hr.reject', $leave->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('hr.index') }}" 
       class="btn btn-secondary mt-4">Back to Dashboard</a>
</div>
@endsection
