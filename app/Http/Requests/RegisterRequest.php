<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'    => ['required', 'string', 'max:100'],
            'middle_name'   => ['nullable', 'string', 'max:100'],
            'last_name'     => ['required', 'string', 'max:100'],
            'email'         => ['required', 'string', 'email', 'max:255'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],

            // company / tenant information
            'company_name'  => ['required', 'string', 'max:255'],
            'subdomain'     => ['nullable', 'string', 'max:63', 'alpha_dash', 'unique:jtech_tenants,subdomain'],
            'phone'         => ['nullable', 'string', 'max:20'],
            'address'       => ['nullable', 'string', 'max:255'],
            'city'          => ['nullable', 'string', 'max:100'],
            'province'      => ['nullable', 'string', 'max:100'],
            'country'       => ['nullable', 'string', 'max:100'],
            'zip_code'      => ['nullable', 'string', 'max:20'],

            // optional plan selection
            'plan_id'       => ['nullable', 'exists:jtech_plans,plan_id'],
            'trial_days'    => ['nullable', 'integer', 'min:0', 'max:90'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'company_name.required' => 'Company name is required.',
            'subdomain.unique' => 'This company identifier is already taken. Try another or leave blank to auto-generate.',
            'plan_id.exists' => 'The selected plan is invalid.',
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'company_name' => 'company name',
        ];
    }
}
