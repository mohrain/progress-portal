<?php

namespace App\View\Components;

use App\Models\Election;
use Illuminate\View\Component;

class ActiveElectionSetting extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $elections;
    public function __construct()
    {
        $this->elections = Election::orderBy('name', 'DESC')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.active-election-setting');
    }
}
