<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingUpdateRequest extends FormRequest
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
            'site_name' => ['required', 'string', 'max:255'],
            'site_email' => ['nullable', 'string', 'email', 'max:255'],
            'country' => ['required', 'string', 'max:40'],
            'time_zone' => ['required', 'string', 'max:40'],
            'default_currency' => ['required', 'string', 'max:40'],
            'currency_icon' => ['required', 'string', 'max:40'],
            'currency_position' => ['required', 'string', 'in:left,right'],
        ];
    }
}
