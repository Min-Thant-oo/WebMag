<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class Navbar extends Component
{
    public function __construct()
    {
        //
    }
    
    public function render()
    {
        return view('components.admin.navbar');
    }
}
