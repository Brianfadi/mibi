<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'service_id' => ['required', 'exists:services,id,is_active,1'],
            'scheduled_at' => ['required', 'date', 'after:now'],
            'session_type' => ['required', 'string', 'in:voice,video,in_person'],
            'timezone' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'payment_method' => ['required', 'string', 'in:mpesa,stripe,paypal,bank_transfer'],
            'phone_number' => ['required_if:payment_method,mpesa', 'string'],
            'stripe_token' => ['required_if:payment_method,stripe', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'scheduled_at.after' => 'The booking time must be in the future.',
            'phone_number.required_if' => 'Phone number is required for M-Pesa payments.',
        ];
    }
}
