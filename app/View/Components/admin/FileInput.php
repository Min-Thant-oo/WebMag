<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class FileInput extends Component
{

    public $name;
    public $label;
    public $old;
    public $placeholder;
    public $type;
    public $required;

    public function __construct( 
        $name,  
        $label, 
        $old,
        $placeholder = 'Please Fill The Form',
        $type='*/*', 
        $required=true,
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->old = $old;
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.admin.file-input');
    }
}
