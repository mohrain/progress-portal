<?php

namespace App\Http\Controllers;

use App\District;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::positioned()->paginate(60);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee = null)
    {
        if (!$employee) {
            $employee = new Employee();
        }
        $districts = District::orderBy('name')->get();
        return view('employees.create', compact('employee', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();
        if ($request->file('profile')) {
            $data['profile'] = Storage::putFile('profile', $request->file('profile'));
        }
        Employee::create($data);
        return redirect()
            ->route('employees.index')
            ->with('success', 'कर्मचारी विवरण सेभ भयो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('frontend.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return $this->create($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->validated();
        if ($request->file('profile')) {
            if ($employee->profile) {
                Storage::delete($employee->profile);
            }
            $data['profile'] = Storage::putFile('profile', $request->file('profile'));
        }
        $employee->update($data);
        return redirect()
            ->route('employees.index')
            ->with('success', 'कर्मचारी विवरण सम्पादन भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if ($employee->profile) {
            Storage::delete($employee->profile);
        }
        $employee->delete();
        return redirect()
            ->back()
            ->with('success', 'कर्मचारी विवरण हटाइयो');
    }

    public function sort(Request $request)
    {
        $employees = json_decode(json_encode($request->employees));

        foreach ($employees as $employee) {
            Employee::whereId($employee->id)->update(['position' => $employee->position]);
        }

        return response()->json(['message' => 'Employee has been sorted'], 200);
    }

    public function frontendIndex()
    {
        $employees = Employee::currentEmployee()->positioned()->paginate(60);
        return view('frontend.employees.index', compact('employees'));
    }

    public function search(Request $request)
    {
        // return $request;

        $employees = new Employee();
        if ($request->has('name')) {
            if ($request->name != null) {
                $employees = $employees->where('name', 'like', '%' . $request->name . '%');
            }
        }
        if ($request->has('email')) {
            if ($request->email != null) {
                $employees = $employees->where('email', $request->email);
            }
        }

        if ($request->has('mobile')) {
            if ($request->mobile != null) {
                $employees = $employees->where('mobile', $request->mobile);
            }
        }

        if ($request->name_english != null) {
            $employees = $employees->where('name_english', 'like', '%' . $request->name_english . '%');
        }
        if ($request->designation != null) {
            $employees = $employees->where('designation', 'like', '%' . $request->designation . '%');
        }
        if ($request->branch != null) {
            $employees = $employees->where('branch', 'like', '%' . $request->branch . '%');
        }
        if ($request->has('gender')) {
            if ($request->gender != null) {
                $employees = $employees->where('gender', $request->gender);
            }
        }
        $employees = $employees
            ->positioned()
            ->paginate(60);
        $employees->appends(request()->except('page'));
        return view('employees.index', compact('employees'));
    }

    
    public function frontendSearch(Request $request)
    {
        // return $request;

        $employees = new Employee();
        if ($request->has('name')) {
            if ($request->name != null) {
                $employees = $employees->where('name', 'like', '%' . $request->name . '%');
            }
        }
        if ($request->has('email')) {
            if ($request->email != null) {
                $employees = $employees->where('email', $request->email);
            }
        }

        if ($request->has('mobile')) {
            if ($request->mobile != null) {
                $employees = $employees->where('mobile', $request->mobile);
            }
        }

        if ($request->name_english != null) {
            $employees = $employees->where('name_english', 'like', '%' . $request->name_english . '%');
        }
        if ($request->designation != null) {
            $employees = $employees->where('designation', 'like', '%' . $request->designation . '%');
        }
        if ($request->branch != null) {
            $employees = $employees->where('branch', 'like', '%' . $request->branch . '%');
        }
        if ($request->has('gender')) {
            if ($request->gender != null) {
                $employees = $employees->where('gender', $request->gender);
            }
        }
        $employees = $employees
            ->currentEmployee()
            ->positioned()
            ->paginate(60);
        $employees->appends(request()->except('page'));
        return view('frontend.employees.index', compact('employees'));
    }
    public function frontendIndexOld()
    {
        $employees = Employee::OldEmployee()->positioned()->paginate(60);
        return view('frontend.employees.index', compact('employees'));
    }
    public function frontendSearchOld(Request $request)
    {
        // return $request;

        $employees = new Employee();
        if ($request->has('name')) {
            if ($request->name != null) {
                $employees = $employees->where('name', 'like', '%' . $request->name . '%');
            }
        }
        if ($request->has('email')) {
            if ($request->email != null) {
                $employees = $employees->where('email', $request->email);
            }
        }

        if ($request->has('mobile')) {
            if ($request->mobile != null) {
                $employees = $employees->where('mobile', $request->mobile);
            }
        }

        if ($request->name_english != null) {
            $employees = $employees->where('name_english', 'like', '%' . $request->name_english . '%');
        }
        if ($request->designation != null) {
            $employees = $employees->where('designation', 'like', '%' . $request->designation . '%');
        }
        if ($request->branch != null) {
            $employees = $employees->where('branch', 'like', '%' . $request->branch . '%');
        }
        if ($request->has('gender')) {
            if ($request->gender != null) {
                $employees = $employees->where('gender', $request->gender);
            }
        }
        $employees = $employees
            ->OldEmployee()
            ->positioned()
            ->paginate(60);
        $employees->appends(request()->except('page'));
        return view('frontend.employees.index', compact('employees'));
    }

}
