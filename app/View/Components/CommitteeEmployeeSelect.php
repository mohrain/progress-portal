<?php

namespace App\View\Components;

use App\Models\CommitteeSecretary;
use App\Models\Employee;
use Illuminate\View\Component;

class CommitteeEmployeeSelect extends Component
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
        return view('components.committee-employee-select');
    }
}
