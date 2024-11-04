<?php

namespace App\View\Components\blog;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class FeaturedPosts extends Component
{
    public $blogs;

    public function __construct(Collection $blogs)
    {
        $this->blogs = $blogs;
    }
    
    public function render()
    {
        return view('components.blog.featured-posts');
    }
}
