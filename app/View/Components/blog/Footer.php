<?php

namespace App\View\Components\Blog;

use App\Models\SiteConfig;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Footer extends Component
{
    public $categories;
    public $configs;

    public function __construct($categories, SiteConfig $configs)
    {
        $this->categories = $categories;
        $this->configs = $configs;
    }

    public function render()
    {
        return view('components.blog.footer');
    }
}
