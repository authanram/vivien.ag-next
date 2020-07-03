<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendeeCreateRequest extends FormRequest
{
    final public function authorize(): bool
    {
        return true;
    }

    final public function rules(): array
    {
        return [
            'attendance' => 'required|numeric|max:10',
            'email' => 'required|email',
            'firstname' => 'required|min:3',
            'message' => 'nullable|min:3',
            'phone' => 'nullable|min:4',
            'salutation' => 'required|bool',
            'surname' => 'required|min:3',
        ];
    }

    final public function messages(): array
    {
        $email = 'Gültige E-Mailadresse erforderlich.';
        $max10 = 'Max 10 Reservierungen möglich.';
        $min3 = 'Mindestens 3 Zeichen erforderlich.';
        $min4 = 'Mindestens 4 Zeichen erforderlich.';
        $required = 'Pflichtfeld';

        return [
            'attendance.max' => $max10,
            'attendance.required' => $required,
            'email.email' => $email,
            'email.required' => $required,
            'firstname.min' => $min3,
            'firstname.required' => $required,
            'message.min' => $min3,
            'phone.min' => $min4,
            'salutation.required' => $required,
            'surname.min' => $min3,
            'surname.required' => $required,
        ];
    }
}
