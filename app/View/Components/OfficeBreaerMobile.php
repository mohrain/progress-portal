<?php

namespace App\View\Components;

use App\Models\InformationOfficer;
use App\Models\OfficeBearer;
use Illuminate\View\Component;

class OfficeBreaerMobile extends Component
{
    public $officeBearers;
    public $informationOfficers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->officeBearers = OfficeBearer::with('election', 'member')
            ->currentElection()
            ->current()
            ->positioned()
            ->get();
        $this->informationOfficers = InformationOfficer::with(['employeeDesignation', 'employee'])->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.office-breaer-mobile');
    }
}
