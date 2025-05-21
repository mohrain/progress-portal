<?php

namespace App\Http\Controllers;

use App\Models\WardEmployee;
use App\Ward;
use Illuminate\Http\Request;

class WardEmployeeController extends Controller
{
    //

    public function index(Ward $ward)
    {
        $employees = $ward->employees()->with('wardEmployee')
            ->latest()->get();



        return view('ward.employees.emp-index', compact('ward', 'employees'));
    }

    public function store(Request $request, Ward $ward)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'position' => 'nullable|string|max:255',
        ]);
        // Check if the employee is already assigned to the ward
        $exists = WardEmployee::where('ward_id', $ward->id)
            ->where('employee_id', $request->employee_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'यो कर्मचारी पहिल्यै वार्डमा छ');
        }

        // Create a new WardEmployee records
        WardEmployee::create([
            'ward_id' => $ward->id,
            'employee_id' => $request->employee_id,
            'position' => $request->position,
        ]);

        return redirect()->back()->with('success', 'कर्मचारी थप गर्न सफल');
    }
    public function edit(Ward $ward, WardEmployee $wardEmployee)
    {
        $employees = $ward->employees()->with('wardEmployee')
            ->latest()->get();



        return view('ward.employees.emp-index', compact('ward', 'employees', 'wardEmployee',));
    }

    public function destroy(WardEmployee $wardEmployee)
    {
        $wardEmployee->delete();
        return redirect()->back()->with('success', 'कर्मचारी हटाउन सफल');
    }
}
