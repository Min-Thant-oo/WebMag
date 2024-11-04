<?php

namespace App\View\Composers;

use App\Models\Blog;
use Illuminate\View\View;

class FeaturedPostsComposer
{
    private $limit = 3;
    private $featured_posts;

    public function __construct()
    {
        $this->featured_posts = Blog::where([
            ['is_featured', '=', true],
            ['published_at', '!=', null],
            ['blog_status_id', '=', '3']
        ])->orderBy('published_at', 'asc')
            ->with('category')
            ->limit($this->limit)->get();
    }
    
    public function compose(View $view)
    {
        $view->with('featured_posts', $this->featured_posts);
    }
}
