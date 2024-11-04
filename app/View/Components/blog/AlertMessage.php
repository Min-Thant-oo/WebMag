<?php

namespace App\View\Components\blog;

use Illuminate\View\Component;

class AlertMessage extends Component
{
    public function __construct()
    {
        //
    }
    
    public function render()
    {
        return view('components.blog.alert-message');
    }
}
