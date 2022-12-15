<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_id' => [
                'required',
                'exists:cars,id',
            ],
            'date' => [
                'required',
                'date_format:Y-m-d',
                'before_or_equal:today',
            ],
            'miles' => [
                'required',
                'min:1',
            ],
        ];
    }
}
