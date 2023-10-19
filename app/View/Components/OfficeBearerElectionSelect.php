<?php

namespace App\View\Components;

use App\Models\Election;
use App\Models\OfficeBearer;
use Illuminate\View\Component;

class OfficeBearerElectionSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $elections;
    public $officeBearer;
    public function __construct(OfficeBearer $officeBearer = null)
    {
        $this->officeBearer = $officeBearer;
        $this->elections = Election::orderBy('name', 'DESC')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.office-bearer-election-select');
    }
}
