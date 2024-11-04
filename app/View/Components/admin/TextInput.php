<?php

namespace App\View\Components\admin;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class TextInput extends Component
{
    public $name;
    public $label;
    public $value;
    public $type;
    public $placeholder;
    public $id;
    public $textarea;
    public $rows;
    public $cols;
    public $required;
    public $disabled;

    public function __construct( 
        $name,  
        $label,
        $value, 
        $type = 'text',
        $placeholder = 'Please Fill The Form',
        $id = null, 
        $textarea = false, 
        $rows=5,
        $cols=3,
        $required=true, 
        $disabled=false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
        $this->placeholder = $placeholder;
        if ($id == null) {
            $this->id = Str::random();
        }
        $this->textarea = $textarea;
        $this->rows = $rows;
        $this->cols = $cols;
        $this->required = $required;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('components.admin.text-input');
    }
}
