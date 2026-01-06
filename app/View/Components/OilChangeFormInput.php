<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OilChangeFormInput extends Component
{
    public $formField;
    public $labelText;
    public $inputType;

    public $inputValueOld;

    public function __construct($formField, $labelText, $inputType, $inputValueOld)
    {
        $this->formField = $formField;
        $this->labelText = $labelText;
        $this->inputType = $inputType;
        $this->inputValueOld = $inputValueOld;
    }

    public function render(): View|Closure|string
    {
        return view('components.oil-change-form-input');
    }
}
