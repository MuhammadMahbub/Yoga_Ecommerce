<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'short_description' => 'required',
            'sku' => 'required|string|max:255|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'subcategory_id.*' => 'required',
            'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

    }

    // public function messages()
    // {
    //     return [
    //         'image.dimensions' => 'The images must be 7:5 ratio.', 
    //         'gallery.dimensions' => 'The images must be 7:5 ratio.'
    //     ];
    // }
}
