<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $label;
    public $name;
    public $id;
    public $row;
    public $col;
    public $placeholder;
    public $model;
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $name, $id = null, $row = 3, $col = 5, $placeholder = null, $model = null, $value = null)
    {
        //
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->row = $row;
        $this->col = $col;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea');
    }
}
