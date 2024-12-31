<?php

namespace App\View\Components;

use App\BillType;
use Illuminate\View\Component;

class BidheyakMobile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $bedheyaks = BillType::get();
        return view('components.bidheyak-mobile', compact('bedheyaks'));
    }
}
