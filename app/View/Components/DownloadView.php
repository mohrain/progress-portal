<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DownloadView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $downloads;
    public function __construct($downloads = [])
    {
        //
        $this->downloads = $downloads;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.download-view');
    }
}
