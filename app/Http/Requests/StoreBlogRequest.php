<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'title.fr'             => 'required|string|unique:blogs,title,max:255',
            'short_description.fr' => 'required|string',
            'description.fr'       => 'required|string',
            'image'                => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.fr.required'                => __('Title is Required in French'),
            'short_description.fr.required'    => __('Please Write Some description in French'),
            'description.fr.required'          => __('Please Write Long description in French'),
            'image.required'                   => __('Please Set an Image'),
            'image.image'                      => __('Image type should be Image'),
        ];
    }
}
