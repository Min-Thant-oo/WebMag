<?php

namespace App\View\Components\Blog;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class MostReadPostsTile extends Component
{
    public $blogs;

    public function __construct(Collection $blogs)
    {
        $this->blogs = $blogs;
    }
    
    public function render()
    {
        return view('components.blog.most-read-posts-tile');
    }
}
