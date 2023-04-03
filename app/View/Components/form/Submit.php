<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submit extends Component
{
    public $text;
    public $action;
    public $type;
    /**
     * Create a new component instance.
     */
    public function __construct($text, $action, $type)
    {
        //
        $this->text = $text;
        $this->action = $action;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.submit');
    }
}
