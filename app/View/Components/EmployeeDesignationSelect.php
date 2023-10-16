<?php

namespace App\View\Components;

use App\Models\Employee;
use App\Models\EmployeeDesignation;
use Illuminate\View\Component;

class EmployeeDesignationSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $employeeDesignations;
    public $employee;
    public function __construct(Employee $employee = null)
    {
        $this->employee = $employee;
        $this->employeeDesignations = EmployeeDesignation::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee-designation-select');
    }
}
