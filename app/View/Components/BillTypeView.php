<?php

namespace App\View\Components;

use App\BillType;
use Illuminate\View\Component;

class BillTypeView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $billTypes;
    public function __construct()
    {
        $this->billTypes = BillType::published()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bill-type-view');
    }
}
