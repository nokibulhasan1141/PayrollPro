<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        // Example employees & salary
        $employees = [
            ['name' => 'John Doe', 'position' => 'Developer', 'salary' => 5000],
            ['name' => 'Jane Smith', 'position' => 'Designer', 'salary' => 4500],
        ];

        return view('payroll.index', compact('employees'));
    }
}
