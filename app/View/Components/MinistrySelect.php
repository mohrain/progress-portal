<?php

namespace App\View\Components;

use App\Models\Bill;
use App\Models\Ministry;
use Illuminate\View\Component;

class MinistrySelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ministries;
    public $bill;
    public function __construct(Bill $bill = null)
    {
        $this->bill = $bill;
        $this->ministries = Ministry::orderBy('name_english')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ministry-select');
    }
}
