<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiklRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_odometer' => ['required', 'integer', 'min:0'],
            'previous_odometer' => ['required', 'integer', 'min:0', 'lte:current_odometer'],
            'previous_oil_change_date' => ['required', 'date', 'before:today'],
        ];
    }
}
