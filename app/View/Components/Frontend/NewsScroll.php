<?php

namespace App\View\Components\Frontend;

use App\Post;
use App\PostCategory;
use Illuminate\View\Component;

class NewsScroll extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $news;
    public function __construct()
    {
        $post_category_id = [2, 3, 4];
        $this->news = Post::whereHas('postCategories', function ($query) use ($post_category_id) {
            $query->whereIn('post_category_id', $post_category_id);
        })
            ->latest()
            ->published()
            ->paginate(8);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.news-scroll');
    }
}
