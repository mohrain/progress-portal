<?php

namespace App\View\Components;

use App\Models\Member;
use App\ParliamentaryParty;
use Illuminate\View\Component;

class ParliamenteryPartyView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $parliamentaryParties;
    public $member;
    public function __construct(Member $member = null)
    {
        $this->member = $member;
        $this->parliamentaryParties = ParliamentaryParty::published()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.parliamentery-party-view');
    }
}
