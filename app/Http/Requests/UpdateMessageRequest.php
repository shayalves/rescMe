<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMessageRequest extends FormRequest
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
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'content' => ['sometimes', 'required', 'string'],
            'status' => ['sometimes', 'integer', 'min:0'],
            'expires_at' => ['sometimes', 'nullable', 'date'],
            'canceled_at' => ['sometimes', 'nullable', 'date'],
            'contact_ids' => ['sometimes', 'array'],
            'contact_ids.*' => [
                'integer',
                'distinct',
                Rule::exists('contacts', 'id')->where('user_id', $this->user()->id)->whereNull('deleted_at'),
            ],
        ];
    }
}
