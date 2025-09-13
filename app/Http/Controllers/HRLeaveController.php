<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    
use App\Models\Leave;

class HRLeaveController extends Controller
{
    // HR Dashboard: list all users
    public function index()
    {
        // Load all users with their leaves
        $users = User::with('leaves')->get();

        // Count total pending leave requests
        $pendingLeavesCount = Leave::where('status', 'pending')->count();

        return view('hr.index', compact('users', 'pendingLeavesCount'));
    }

    // Show leaves of a specific user
    public function show($id)
    {
        $user = User::with('leaves')->findOrFail($id);
        return view('hr.show', compact('user'));
    }

    // Approve leave
    public function approve($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'approved';
        $leave->save();

        return redirect()->back()->with('success', 'Leave approved successfully!');
    }

    // Reject leave
    public function reject($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'rejected';
        $leave->save();

        return redirect()->back()->with('error', 'Leave rejected.');
    }
}
