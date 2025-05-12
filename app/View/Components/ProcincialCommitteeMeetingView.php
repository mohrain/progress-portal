<?php

namespace App\View\Components;

use App\Meeting;
use App\Models\MeetingType;
use Illuminate\View\Component;

class ProcincialCommitteeMeetingView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $meetings;
    public function __construct()
    {
        $this->meetings = Meeting::with('meetingType')->active()->latest()->take(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.procincial-committee-meeting-view');
    }
}
