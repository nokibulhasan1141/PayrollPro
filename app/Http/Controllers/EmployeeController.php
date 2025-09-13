<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Announcement; // ✅ add this
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $employee = Auth::user();
        $leaves = $employee->leaves()->latest()->get();

        // ✅ Get the latest 5 announcements
        $announcements = Announcement::latest()->take(5)->get();

        return view('employee.dashboard', compact('employee', 'leaves', 'announcements'));
    }

    public function requestForm()
    {
        return view('employee.leave-request');
    }

    public function submitLeave(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:Casual,Sick,Earned',
            'reason' => 'nullable|string|max:500',
        ]);

        $employee = Auth::user();

        Leave::create([
            'employee_id' => $employee->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'type' => $request->type,
            'status' => 'pending',
            'reason' => $request->reason,
        ]);

        return redirect()->route('employee.dashboard')->with('success', 'Leave request submitted!');
    }
}
