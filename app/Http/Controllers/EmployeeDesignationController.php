<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDesignation;
use App\Http\Requests\StoreEmployeeDesignationRequest;
use App\Http\Requests\UpdateEmployeeDesignationRequest;

class EmployeeDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDesignation $employeeDesignation = null)
    {
        if (!$employeeDesignation) {
            $employeeDesignation = new EmployeeDesignation();
        }
        $employeeDesignations = EmployeeDesignation::latest()->get();
        return view('employee-designations.index', compact('employeeDesignations', 'employeeDesignation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeDesignationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeDesignationRequest $request)
    {
        EmployeeDesignation::create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'Employee Designation Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeDesignation  $employeeDesignation
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDesignation $employeeDesignation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeDesignation  $employeeDesignation
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeDesignation $employeeDesignation)
    {
        return $this->index($employeeDesignation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeDesignationRequest  $request
     * @param  \App\Models\EmployeeDesignation  $employeeDesignation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeDesignationRequest $request, EmployeeDesignation $employeeDesignation)
    {
        $employeeDesignation->update($request->validated());
        return redirect()
            ->route('employee-designations.index')
            ->with('success', 'Employee Designation updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeDesignation  $employeeDesignation
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeDesignation $employeeDesignation)
    {
        $employeeDesignation->delete();
        return redirect()
            ->back()
            ->with('success', 'employee designation deleted');
    }
}
