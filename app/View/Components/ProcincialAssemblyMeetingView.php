<?php

namespace App\View\Components;

use App\Meeting;
use Illuminate\View\Component;

class ProcincialAssemblyMeetingView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $meetings;
    public function __construct()
    {
        $this->meetings=Meeting::active()->assembly()->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.procincial-assembly-meeting-view');
    }
}
