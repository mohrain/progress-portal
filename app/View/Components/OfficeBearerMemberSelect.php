<?php

namespace App\View\Components;

use App\Models\Member;
use App\Models\OfficeBearer;
use Illuminate\View\Component;

class OfficeBearerMemberSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $members;
    public $officeBearer;
    public function __construct(OfficeBearer $officeBearer = null)
    {
        $this->officeBearer = $officeBearer;
        $this->members = Member::where('election_id',settings('election_id'))->orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.office-bearer-member-select');
    }
}
