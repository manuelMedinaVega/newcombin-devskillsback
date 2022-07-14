<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePayable extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service_type' => ['required', 'string', 'min:1', 'max:100'],
            'service_description' => ['required', 'string', 'min:1', 'max:200'],
            'expires_at' => ['required', 'string', 'date_format:Y-m-d'],
            'service_amount' => ['required', 'numeric', 'gt:0'],
            'status' => ['required', 'in:pending,paid'],
            'bar_code' => ['required', 'unique:payable,bar_code']
        ];
    }
}
