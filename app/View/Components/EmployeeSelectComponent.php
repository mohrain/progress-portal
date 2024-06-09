<?php

namespace App\View\Components;
use App\Models\Employee;
use Illuminate\View\Component;

class EmployeeSelectComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $employees;

    public function __construct()
    {
        $this->employees = Employee::positioned()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employee-select-component');
    }
}
