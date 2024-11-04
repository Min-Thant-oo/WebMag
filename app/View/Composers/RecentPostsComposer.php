<?php


namespace App\View\Composers;


use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class RecentPostsComposer
{
    private $limit = 3;
    private $recent_posts;

    public function __construct()
    {
        $this->recent_posts = Blog::where([
            ['published_at', '!=', null],
            ['blog_status_id', '=', '3']
        ])->orderBy('published_at')
            ->with('category')
            ->limit($this->limit)->get();
    }
    
    public function compose(View $view)
    {
        $view->with('recent_posts', $this->recent_posts);
    }
}
