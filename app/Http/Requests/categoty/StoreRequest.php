<?php

namespace App\Http\Requests\categoty;

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
            'name' => ["required", "min:4", "max:255"],
            'slug' => ["required", "min:4", "max:255"],
            'image' => ["required", "image"]
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'category name',
            'slug' => 'category slug',
            'image' => 'category image'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'a :attribute is required',
            'name.min' => 'the :attribute must be least 4 chars',
            'name.max' => 'the :attribute must be lees then 255',
            'slug.required' => 'a :attribute is required',
            'slug.min' => 'the :attribute must be least 4 chars',
            'slug.max' => 'the :attribute must be lees then 255',
            'image.required' => 'a :attribute is required',
        ];
    }
}
