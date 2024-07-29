<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Enums\Situation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phoneNumber' => 'required|regex:/^[0-9]{8}$/',
            'gender' => ['required', Rule::in(array_keys(Gender::toArray()))],
            'address' => 'required|string|max:255',
            'situation' => ['required', Rule::in(array_keys(Situation::toArray()))],
            'isMember' => 'required|in:yes,no',
            'agreement' => 'required|in:yes',
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phoneNumber.required' => 'Please enter your phone number.',
            'phoneNumber.regex' => 'Please enter a valid 10-digit phone number.',
            'gender.required' => 'Please select your gender.',
            'address.required' => 'Please enter your address.',
            'situation.required' => 'Please select your situation.',
            'isMember.required' => 'Please indicate if you are a member of ANT.',
            'agreement.required' => 'Please agree to the terms and conditions.',
            'agreement.in' => 'You must agree to the terms and conditions to register.',
        ];
    }
}
