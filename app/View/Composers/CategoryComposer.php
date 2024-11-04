<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    private $limit = 3;
    private $categories;

    public function __construct()
    {
        $this->categories = Category::withCount('blogs')->orderBy('blogs_count', 'desc')->get();
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
