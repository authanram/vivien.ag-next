<?php

namespace App\Http\Requests\Public;

use App\Enums\Salutation;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreAttendeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, ValidationRule|array<mixed>|string> */
    public function rules(): array
    {
        $event = $this->route('event');
        $maxSeats = $event ? $event->available_seats : 1;

        return [
            'salutation' => ['required', Rule::enum(Salutation::class)],
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'attendance' => ['required', 'integer', 'min:1', 'max:'.$maxSeats],
            'message' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $event = $this->route('event');
            if ($event && $event->available_seats <= 0) {
                $validator->errors()->add('attendance', __('Dieses Seminar ist bereits ausgebucht.'));
            }
        });
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return [
            'salutation.required' => __('Bitte wählen Sie eine Anrede.'),
            'firstname.required' => __('Bitte geben Sie Ihren Vornamen ein.'),
            'surname.required' => __('Bitte geben Sie Ihren Nachnamen ein.'),
            'email.required' => __('Bitte geben Sie Ihre E-Mail-Adresse ein.'),
            'email.email' => __('Bitte geben Sie eine gültige E-Mail-Adresse ein.'),
            'attendance.required' => __('Bitte geben Sie die Anzahl der Teilnehmer an.'),
            'attendance.max' => __('Es sind nicht genügend Plätze verfügbar.'),
        ];
    }
}
