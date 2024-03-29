<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
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
    public $desc;
    public $min;
    public $max;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $name, $type = "text",  $value = null, $id = null, $validation = null, $placeholder = null, $isRequired = true, $readOnly = false, $model = null, $desc = null, $min = 0, $max = 1)
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
        $this->desc = $desc;
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input', [
            'desc' => $this->desc,
        ]);
    }
}
