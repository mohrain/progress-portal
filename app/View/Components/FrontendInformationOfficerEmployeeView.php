<?php

namespace App\View\Components;

use App\Models\InformationOfficer;
use Illuminate\View\Component;

class FrontendInformationOfficerEmployeeView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $informationOfficers;
    public function __construct()
    {
        $this->informationOfficers = InformationOfficer::with(['employeeDesignation', 'employee'])->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend-information-officer-employee-view');
    }
}
