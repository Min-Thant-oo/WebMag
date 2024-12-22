<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class SelectInput extends Component
{
    public $name;
    public $label;
    public $options;
    public $value;
    public $placeholder;
    public $required;
    public $disabled;

    public function __construct( 
        $name,  
        $label,
        $options, $value,
        $placeholder='Please Fill The Form',
        $required=true,
        $disabled=false,
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->disabled = $disabled;

    }

    public function is_selected($option): string
    {
        if($option == null && $this->value == '')
            return 'selected';
        if($option == $this->value)
            return 'selected';
        return '';
    }
    
    public function render()
    {
        return view('components.admin.select-input');
    }
}
