<?php

namespace App\View\Components;

use App\Models\Bill;
use App\Models\Member;
use Illuminate\View\Component;

class MemberSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $members;
    public $bill;
    public function __construct(Bill $bill = null)
    {
        $this->bill = $bill;
        $this->members = Member::where('election_id',settings('election_id'))->orderBy('name_english')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.member-select');
    }
}
