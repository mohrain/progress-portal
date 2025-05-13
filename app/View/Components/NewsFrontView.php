<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NewsFrontView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $news;
    public function __construct($news)
    {
        //

        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.news-front-view');
    }
}
