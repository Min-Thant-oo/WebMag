<?php

namespace App\View\Components\Blog;

use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostTextOverCard extends Component
{
    public $blog;
    
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    
    public function render()
    {
        return view('components.blog.post-text-over-card');
    }
}
