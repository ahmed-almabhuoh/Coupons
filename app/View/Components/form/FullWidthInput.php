<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FullWidthInput extends Component
{
    public $label;
    public $type;
    public $value;
    public $readOnly;
    public $name;
    public $id;
    public $validation;
    public $placeholder;
    public $isRequired;
    public $model;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $name, $type = "text",  $value = null, $id = null, $validation = null, $placeholder = null, $isRequired = true, $readOnly = false, $model = null)
    {
        //
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->readOnly = $readOnly;
        $this->name = $name;
        $this->id = $id;
        $this->validation = $validation;
        $this->placeholder = $placeholder;
        $this->isRequired = $isRequired;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.full-width-input');
    }
}
