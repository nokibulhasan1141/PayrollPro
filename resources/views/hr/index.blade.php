@extends('layouts.app')

@section('title', 'HR Dashboard - PayrollPro')

@section('content')
<div class="container mt-5">
    <h2 class="text-2xl fw-bold mb-6">Employee Leave Management</h2>

    <div class="table-responsive">
        <table class="table table-striped shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Total Leaves</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="hover-bg-light">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->leaves->count() }}</td>
                    <td>
                        <a href="{{ route('hr.show', $user->id) }}" 
                           class="btn btn-primary btn-sm">
                           View Leaves
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
