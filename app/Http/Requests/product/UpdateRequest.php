<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'short_description' => ["min:10"],
            'description' => ["required", "min:10"],
            'ragulare_price' => ["required"],
            'sale_price' => ["required"],
            'sku' => ["required", "min:4", "max:255"],
            'stoce_status' => ["required"],
            'featured' => ["min:1"],
            'quantity' => ["min:1"],
            'image' => ["required"],
            'images' => ["required"],
            'category_id' => ["required"],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'product name',
            'slug' => 'slug of product',
            'short-description' => 'product short desc',
            'description' => 'product desc',
            'ragulare-price' => 'product price',
            'sale-price' => 'product sale price',
            'sku' => 'product number',
            'stoce-status' => 'stock',
            'image' => 'image',
            'images' => 'images',
            'category-id' => 'product id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'the :attribute is required',
            'name.min' => 'the :attribute must be more then 4 chears',
            'name.max' => 'the :attribute must be lees then 255 chears',
            'slug.required' => 'the :attribute is required',
            'slug.min' => 'the :attribute must be more then 4 chears',
            'slug.max' => 'the :attribute must be lees then 255 chears',
            'short-description.min' => 'the :attribute must be more then 10 chears',
            'description.required' => 'the :attribute is required',
            'description.min' => 'the :attribute must be more then 10 chears',
            'ragulare-price.required' => 'the :attribute is reuired',
            'sale-price.required' => 'the :attribute is reuired',
            'sku.required' => 'the :attribute is reuired',
            'sku.min' => 'the :attribute must be more then 4 chears',
            'sku.max' => 'the :attribute must be lees then 255 chears',
            'stoce-status.required' => 'the :attribute is reuired',
            'image.required' => 'the :attribute is reuired',
            'category-id.required' => 'the :attribute is reuired',
        ];
    }
}
