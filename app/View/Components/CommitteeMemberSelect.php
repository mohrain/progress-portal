<?php

namespace App\View\Components;

use App\Models\CommitteeMember;
use App\Models\Member;
use Illuminate\View\Component;

class CommitteeMemberSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $members;
    public $committeeMember;
    public function __construct(CommitteeMember $committeeMember = null)
    {
        $this->committeeMember = $committeeMember;
        $this->members = Member::currentElection()->orderBy('name')->get();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.committee-member-select');
    }
}
