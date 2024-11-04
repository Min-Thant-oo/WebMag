<?php

namespace App\View\Components\blog;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $categories;
    public $configs;

    public function __construct(Collection $categories, $configs)
    {
        $this->categories = $categories;
        $this->configs = $configs;
    }
    
    public function render()
    {
        return view('components.blog.navbar');
    }
}
