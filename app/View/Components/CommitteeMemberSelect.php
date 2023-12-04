<?php

namespace App\View\Components;

use App\Models\Committee;
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
    public $committeeMembers;
    public function __construct(Committee $committee, CommitteeMember $committeeMember = null)
    {
        $this->committeeMember = $committeeMember;
        $this->committeeMembers = $committee
        ->members()
        ->with('member')
        ->get();
        
        foreach ($this->committeeMembers as $committeeMember) {
            $members[] = $committeeMember->member->id;
            # ode...
        }
        $this->members = Member::currentElection()->whereNotIn('id',$members)->orderBy('name')->get();
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
