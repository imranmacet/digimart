<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RazorpaySettingUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'razorpay_currency_rate' => ['required', 'numeric'],
            'razorpay_currency' => ['required', 'string'],
            'razorpay_key' => ['required', 'string'],
            'razorpay_secret_key' => ['required', 'string'],
            'razorpay_status' => ['required'],
        ];
    }
}
