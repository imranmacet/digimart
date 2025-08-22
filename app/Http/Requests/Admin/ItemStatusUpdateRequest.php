<?php

namespace App\Http\Requests\Admin;

use App\Services\NotificationService;
use Illuminate\Foundation\Http\FormRequest;

class ItemStatusUpdateRequest extends FormRequest
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
            'status' => ['required', 'in:pending,approved,soft_rejected,hard_rejected'],
            'reason' => ['required_if:status,soft_rejected,hard_rejected']
        ];
    }

    public function withValidator($validator) {
        if($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                NotificationService::ERROR($error);
            }
        }
    }
}
