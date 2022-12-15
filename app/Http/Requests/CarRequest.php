<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'make' => [
                'required',
                'unique:App\Models\Car,make',
            ],
            'model' => ['required'],
            'year' => [
                'required',
                'date_format:Y',
            ],
        ];
    }
}
