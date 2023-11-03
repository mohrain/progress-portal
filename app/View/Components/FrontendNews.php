<?php

namespace App\View\Components;

use App\Post;
use App\PostCategory;
use Illuminate\View\Component;

class FrontendNews extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $parliamentaryNotice;
    public $secretariatNotice;
    public $dailyAgendas;
    public $postCategories;
    public function __construct()
    {

        $this->postCategories = PostCategory::with('childcategories.childcategories')
        ->where('parent_id', 1)
        ->actived()
        ->get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend-news');
    }
}
