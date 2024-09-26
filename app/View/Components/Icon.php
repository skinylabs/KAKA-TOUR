<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public $fill;
    public $type;
    public $width;
    public $height;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $fill, $width, $height)
    {
        $this->type = $type;
        $this->fill = $fill;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icons.icon');
    }
}
