<?php

namespace App\View\Components;

use App\Models\Employee;
use App\Models\InformationOfficer;
use Illuminate\View\Component;

class InformationOfficerEmployeeSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $employees;
    public $informationOfficer;

    public function __construct(InformationOfficer $informationOfficer = null)
    {
        $this->informationOfficer = $informationOfficer;
        $this->employees = Employee::positioned()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.information-officer-employee-select');
    }
}
