<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
        session()->put(['id' => $this->category->id]);
        return [
            'category_name.fr' => 'required|unique:categories,name,'. $this->id,
        ];
    }

    public function messages()
    {
        return [
            'category_name.fr.required' => __('Category Name is Required in French'),
            'category_name.fr.unique'   => __('This Name is already taken'),
        ];
    }
}
