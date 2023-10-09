<?php

namespace App\View\Components;

use App\Page;
use Illuminate\View\Component;

class FrontendAboutUsView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $page;
    public function __construct()
    {
        $this->page = Page::findOrFail(1);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend-about-us-view');
    }
}
