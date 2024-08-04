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
            'agreement' => 'required|accepted',

            'selectedGovernorate' => 'required|string',
            'selectedDelegation' => 'required|string',
            'selectedCity' => 'required|string',
            'situation' => ['required', Rule::in(array_keys(Situation::toArray()))],

            'isMember' => 'required|boolean',
            'school' => 'required|string|max:255',
            'studyField' => 'required|string|max:255',
            'studyYear' => 'required|string|max:255',
            'currentPosition' => 'nullable|string|max:255',
            'interests' => 'required|array',
            'interests.*' => 'string',
            'roomType' => 'string|max:255',
            'motivation' => 'required|string|max:1000',
            'conferenceIdea' => 'nullable|string|max:1000',
            'needTransport' => 'required|boolean',
            'heardFrom' => 'nullable|array',
            'heardFrom.*' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phoneNumber.required' => 'Please enter your phone number.',
            'phoneNumber.regex' => 'Please enter a valid 8-digit phone number.',
            'gender.required' => 'Please select your gender.',
            'agreement.required' => 'You must agree to the terms and conditions.',
            'agreement.accepted' => 'You must agree to the terms and conditions to register.',
            'selectedGovernorate.required' => 'Please select your governorate.',
            'selectedDelegation.required' => 'Please select your delegation.',
            'selectedCity.required' => 'Please select your city.',
            'situation.required' => 'Please select your situation.',
            'isMember.required' => 'Please indicate if you are a member of ANT.',
            'school.required' => 'Please enter your school name.',
            'studyField.required' => 'Please enter your field of study.',
            'studyYear.required' => 'Please enter your study year.',
            'currentPosition.required' => 'Please enter your current position.',
            'interests.required' => 'Please select your interests.',
            'roomType.required' => 'Please select your room type.',
            'motivation.required' => 'Please enter your motivation for attending.',
            'conferenceIdea.max' => 'Conference idea cannot exceed 1000 characters.',
            'needTransport.boolean' => 'Need transport must be true or false.',
            'heardFrom.array' => 'Heard from must be an array.',
            'heardFrom.*.string' => 'Each heard from item must be a string.',
        ];
    }
}
