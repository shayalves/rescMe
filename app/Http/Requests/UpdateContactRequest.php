<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'emails' => ['nullable', 'array'],
            'emails.*.id' => ['nullable', 'integer'],
            'emails.*.email' => ['required_with:emails', 'string', 'email', 'max:255'],
            'emails.*.main' => ['nullable', 'boolean'],
            'phones' => ['nullable', 'array'],
            'phones.*.id' => ['nullable', 'integer'],
            'phones.*.international_code' => ['required_with:phones', 'string', 'max:10'],
            'phones.*.phone_number' => ['required_with:phones', 'string', 'max:30'],
            'phones.*.main' => ['nullable', 'boolean'],
        ];
    }
}
