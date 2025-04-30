<?php

namespace App\View\Components;

use App\Models\OfficeBearer;
use Illuminate\View\Component;

class FrontendOfficeBrearerView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $officeBearers;
    public function __construct()
    {
        $this->officeBearers = OfficeBearer::with('election', 'member.officeDesignation')
            ->currentElection()
            ->current()
            ->positioned()
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        // dd($this->officeBearers);

        return view('components.frontend-office-brearer-view', [
            'officeBearers' => $this->officeBearers,
        ]);
    }
}
