<?php


namespace App\View\Composers;


use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\View\View;

class MostReadPostsComposer
{
    private $limit = 5;
    private $most_read_posts;

    public function __construct()
    {
        $this->most_read_posts = Blog::where([
            ['blog_status_id', '=', 3],
            ['published_at', '<=', Carbon::now()]
        ])
            ->with('category')
            ->withCount('blog_views')
            ->orderBy('blog_views_count', 'desc')
            ->limit($this->limit)
            ->get();
    }
    
    public function compose(View $view)
    {
        $view->with('most_read_posts', $this->most_read_posts);
    }
}
