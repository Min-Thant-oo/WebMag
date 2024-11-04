<?php

namespace App\View\Components\blog;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class PostCategories extends Component
{
    public $categories;

    public function __construct(Collection $categories)
    {
        $this->categories = $categories;
    }

    public function render()
    {
        return view('components.blog.post-categories');
    }
}
