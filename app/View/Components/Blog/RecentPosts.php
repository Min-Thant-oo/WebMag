<?php

namespace App\View\Components\Blog;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class RecentPosts extends Component
{
    public $blogs;

    public function __construct(Collection $blogs)
    {
        $this->blogs = $blogs;
    }

    public function render()
    {
        return view('components.blog.recent-posts');
    }
}
