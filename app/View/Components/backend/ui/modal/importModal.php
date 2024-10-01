<?php

namespace App\View\Components\backend\ui\modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class importModal extends Component
{
    public $id;
    public $title;
    public $actionUrl;
    public $method;
    public $buttonText;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $title, $actionUrl, $method = 'POST', $buttonText = 'Upload File')
    {
        $this->id = $id;
        $this->title = $title;
        $this->actionUrl = $actionUrl;
        $this->method = $method;
        $this->buttonText = $buttonText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.ui.modal.import-modal');
    }
}
