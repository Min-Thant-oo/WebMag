<?php

namespace App\View\Components\admin;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.admin.sidebar');
    }
}
