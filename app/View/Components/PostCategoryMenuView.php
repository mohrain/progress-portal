<?php

namespace App\View\Components;

use App\PostCategory;
use App\PostCategoryMenu;
use Illuminate\View\Component;

class PostCategoryMenuView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $postCategoryMenus;
    public $postCategories;

    public function __construct()
    {
        $this->postCategoryMenus = PostCategoryMenu::positioned()->get();

        $this->postCategories = PostCategory::with('childcategories.childcategories')
            ->where('parent_id', null)
            ->actived()
            ->orderBy('name')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-category-menu-view');
    }
}
