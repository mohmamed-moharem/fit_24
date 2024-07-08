<?php

namespace App\Http\Requests\reviews;

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
            'ratte' => ['required'],
            'comment' => ['required', 'min:5'],
        ];
    }

    public function attributes()
    {
        return [
            'ratte' => 'value',
            'comment' => 'content',
        ];
    }

    public function messages(): array
    {
        return [
            'ratte.required' => 'the :attribute is required',
            'comment.required' => 'the :attribute is required',
            'comment.min' => 'the :attribute most be more then 5 chares',
        ];
    }
}
