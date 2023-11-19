<?php

namespace App\View\Components\Frontend;

use App\Models\Committee;
use Illuminate\View\Component;

class CommitteeChairman extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $committeeMember;
    public $committee;
    public $committeeSecretary;

    public function __construct(Committee $committee)
    {
        $this->committee = $committee;
        $this->committeeMember = $this->committee
            ->members()
            ->where('designation', 'सभापति')
            ->orWhere('designation', 'जेष्ठ सदस्य')
            ->first();

        $this->committeeSecretary = $committee
            ->committeeSecretary()
            ->with('employee')
            ->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.committee-chairman');
    }
}
