<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreMassiveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'bearer_token' => ['required'],
            'company_token' => ['required'],
            'ref_transaction' => ['required'],
            'customer_name' => ['required'],
            'customer_last_name' => ['required'],
            'customer_email' => ['required', 'email'],
            'customer_phone' => ['required'],
            'customer_address' => ['required'],
            'description' => ['required'],
            'start_at' => ['required', 'date'],
            'expired_at' => ['required', 'date'],
            'coin' => ['required'],
            'amount' => ['required'],
            'coin_item' => ['required'],
            'code' => ['required'],
            'base' => ['required'],
            'quantity' => ['required'],
            'recharge' => ['required'],
            'discount' => ['required'],
            'ref_transaction1' => ['required'],
            'customer_name1' => ['required'],
            'customer_last_name1' => ['required'],
            'customer_email1' => ['required', 'email'],
            'customer_phone1' => ['required'],
            'customer_address1' => ['required'],
            'description1' => ['required'],
            'start_at1' => ['required', 'date'],
            'expired_at1' => ['required', 'date'],
            'coin1' => ['required'],
            'amount1' => ['required'],
            'amount_item' => ['required'],
            'coin_item1' => ['required'],
            'code1' => ['required'],
            'base1' => ['required'],
            'quantity1' => ['required'],
            'recharge1' => ['required'],
            'discount1' => ['required'],
            'amount_item1' => ['required'],
        ];
    }
}
