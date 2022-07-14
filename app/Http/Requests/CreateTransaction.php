<?php

namespace App\Http\Requests;

use App\Models\Payable;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransaction extends FormRequest
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
        if($this->input('tax_bar_code')) {
            $payable = Payable::find($this->input('tax_bar_code'));
            $amount = 0;
            if($payable) {
                $amount = $payable->service_amount;
            }
        }
        return [
            'payment_method' => ['required', 'in:debit_card,credit_card,cash'],
            'card_number' => ['required_unless:payment_method,cash', 'string', 'max:19', 'min:14'],
            'amount' => ['required', 'numeric', 'in:'.$amount],
            'paid_at' => ['required', 'string', 'date_format:Y-m-d'],
            'tax_bar_code' => ['required', 'unique:transaction,tax_bar_code', 
                'exists:payable,bar_code']
        ];
    }
}
