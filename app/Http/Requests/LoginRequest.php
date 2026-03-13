<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
            'subdomain' => ['nullable', 'string', 'max:63'],
        ];

        if (! $this->filled('subdomain')) {
            $rules['email'][] = 'exists:users,email';
        } else {
            $rules['subdomain'][] = Rule::exists('jtech_tenants', 'subdomain');
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'No account found with this email.',
            'password.required' => 'Password is required.',
            'subdomain.exists' => 'Company or subdomain not found.',
        ];
    }
}
