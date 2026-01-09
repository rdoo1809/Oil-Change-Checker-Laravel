<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OilChangeFormErrors extends Component
{
    public $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function render(): View|Closure|string
    {
        return view('components.oil-change-form-errors');
    }
}
