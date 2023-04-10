<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultiImage extends Component
{
    public $label;
    public $name;
    public $id;
    public $isRequired;
    public $model;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $name, $id = null, $isRequired = false, $model = null)
    {
        //
        $this->name = $name;
        $this->label = $label;
        $this->id = $id;
        $this->isRequired = $isRequired;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.multi-image');
    }
}
