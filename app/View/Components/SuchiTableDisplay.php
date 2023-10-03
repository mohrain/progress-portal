<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SuchiTableDisplay extends Component
{
    public $suchis;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($suchis, $type)
    {
        $this->suchis = $suchis;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.suchi-table-display');
    }
}
