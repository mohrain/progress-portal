<?php

namespace App\View\Components;

use App\Models\Bill;
use App\Models\BillCategory;
use Illuminate\View\Component;

class BillCategorySelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $billCategories;
    public $bill;
    public function __construct(Bill $bill = null)
    {
        $this->bill = $bill;
        $this->billCategories = BillCategory::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bill-category-select');
    }
}
