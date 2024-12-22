<?php

namespace App\View\Components\Blog;

use Illuminate\View\Component;

class MostReadPosts extends Component
{
    public $blogs;
    public $title;

    public function __construct($blogs, $title="Most Read")
    {
        $this->blogs = $blogs;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.blog.most-read-posts');
    }
}
