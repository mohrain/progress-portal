<?php

namespace App\View\Components;

use App\Meeting;
use App\Models\MeetingType;
use Illuminate\View\Component;

class ProcincialAssemblyMeetingView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $meetingTypes;
    public function __construct()
    {
        $this->meetingTypes = MeetingType::get();
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
