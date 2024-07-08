<?php

namespace App\Http\Requests\about;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'review' => ['required', 'min:5'],
        ];
    }

    public function attributes(): array
    {
        return [
            'review' => 'content feild'
        ];
    }

    public function messages(): array
    {
        return [
            'review.required' => 'the :attribute is required',
            'review.min' => 'the :attribute most be more then 5 chars'
        ];
    }
}
