<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DynamicForm extends Component
{
    public $title;
    public $methode;
    public $action;
    public $fields;

    public function __construct($action, $methode = 'POST', $fields=[], $title)
    {
        $this->methode = $methode;
        $this->action = $action;
        $this->fields = $fields;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dynamic-form');
    }
}
