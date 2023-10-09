<?php

namespace App\View\Components;

use App\Post;
use App\PostCategory;
use Illuminate\View\Component;

class PostCategorySelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post;
    public $postCategories;
    public function __construct(Post $post=null)
    {
        $this->post = $post;
        $this->postCategories = PostCategory::with(['childCategories.childCategories'])->where('parent_id', null)->orderBy('name')->get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-category-select');
    }
}
