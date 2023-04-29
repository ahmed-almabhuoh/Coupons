<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $name;
    public $options;
    public $id;
    public $isActive;
    public $model;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $name, $options, $id = null, $isActive = true, $model = null)
    {
        //
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->options = $options;
        $this->isActive = $isActive;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
