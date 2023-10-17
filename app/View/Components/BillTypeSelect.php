<?php

namespace App\View\Components;

use App\BillType;
use App\Models\Bill;
use Illuminate\View\Component;

class BillTypeSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $billTypes;
     public $bill;
    public function __construct(Bill $bill= null)
    {
        $this->bill= $bill;
        $this->billTypes = BillType::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bill-type-select');
    }
}
