<?php

namespace App\View\Components;

use App\Models\Election;
use App\Models\Member;
use Illuminate\View\Component;

class ElectionYearSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $elections;
    public $member;
    public function __construct(Member $member=null)
    {
        $this->member = $member;
        $this->elections = Election::orderBy('name', 'DESC')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.election-year-select');
    }
}
