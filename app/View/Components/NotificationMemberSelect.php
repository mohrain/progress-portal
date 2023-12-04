<?php

namespace App\View\Components;

use App\Models\Committee;
use App\Models\Member;
use Illuminate\View\Component;

class NotificationMemberSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $members;
    public $committeeMembers;
    public $committeeMember;
    public $committee;
    public function __construct(Committee $committee = null)
    {
        $this->members = Member::currentElection()
            ->orderBy('name_english')
            ->get();
        $this->committee = $committee;

        if ($this->committee) {
            $this->committeeMembers = $committee
                ->members()
                ->with('member')
                ->get();

            foreach ($this->committeeMembers as $item) {
                $this->committeeMember[] = $item->member;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification-member-select');
    }
}
