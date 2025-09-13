@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-md">
    <h2 class="text-2xl font-bold mb-4">Request Leave</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('employee.leave.submit') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Leave Type</label>
            <select name="type" class="w-full border rounded px-3 py-2">
                <option value="Casual">Casual</option>
                <option value="Sick">Sick</option>
                <option value="Earned">Earned</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Start Date</label>
            <input type="date" name="start_date" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">End Date</label>
            <input type="date" name="end_date" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Reason (optional)</label>
            <textarea name="reason" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
            Submit Leave Request
        </button>
    </form>
</div>
@endsection
