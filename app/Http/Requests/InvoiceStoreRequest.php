<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
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
            'customer_email' => ['required','email'],
            'customer_phone' => ['required'],
            'customer_address' => ['required'],
            'description' => ['required'],
            'start_at' => ['required','date'],
            'expired_at' => ['required','date'],
            'coin' => ['required'],
            'coin_item' => ['required'],
            'amount' => ['required'],
            'code' => ['required'],
            'base' => ['required'],
            'quantity' => ['required'],
            'recharge' => ['required'],
            'discount' => ['required'],
            'amount_item' => ['required'],
        ];
    }
}
