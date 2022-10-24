<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name.fr' => 'required|unique:categories,name',
        ];
    }

    public function messages()
    {
        return [
            'name.fr.required' => __('Category Name is Required in French'),
            // 'name.fr.unique'   => __('This Name is already taken'),
        ];
    }
}
