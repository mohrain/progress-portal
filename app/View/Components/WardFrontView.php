<?php

namespace App\View\Components;

use App\Ward;
use Illuminate\View\Component;

class WardFrontView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $wards;
    public function __construct()
    {
        //
        $this->wards = Ward::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ward-front-view');
    }
}
