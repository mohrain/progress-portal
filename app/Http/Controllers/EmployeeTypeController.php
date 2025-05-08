<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use App\Http\Requests\StoreEmployeeTypeRequest;
use App\Http\Requests\UpdateEmployeeTypeRequest;
use Illuminate\Http\Request;

class EmployeeTypeController extends Controller
{

    public function index()
    {
        $employeeTypes = EmployeeType::latest()->get();
        $employeeType = new EmployeeType(); // for the create form

        return view('employee-types.index', compact('employeeTypes', 'employeeType'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        EmployeeType::create($validated);

        return redirect()->route('employee-types.index')->with('success', 'कर्मचारी प्रकार सफलतापूर्वक थपियो।');
    }

    public function edit(EmployeeType $employeeType)
    {
        $employeeTypes = EmployeeType::latest()->get();

        return view('employee-types.index', compact('employeeTypes', 'employeeType'));
    }

    public function update(Request $request, EmployeeType $employeeType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $employeeType->update($validated);

        return redirect()->route('employee-types.index')->with('success', 'कर्मचारी प्रकार सफलतापूर्वक अपडेट गरियो।');
    }

    public function destroy(EmployeeType $employeeType)
    {
        $employeeType->delete();

        return redirect()->route('employee-types.index')->with('success', 'कर्मचारी प्रकार सफलतापूर्वक हटाइयो।');
    }
}
