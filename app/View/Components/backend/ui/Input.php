<?php

namespace App\View\Components\backend\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $id;
    public $name;
    public $placeholder;
    public $value;
    public $required;
    /**
     * Create a new component instance.
     */
    public function __construct($label, $id, $name, $placeholder = '', $value = '', $required = false)
    {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.ui.input');
    }
}
