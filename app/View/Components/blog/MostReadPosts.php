<?php

namespace App\View\Components\blog;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;

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
