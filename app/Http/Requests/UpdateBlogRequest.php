<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title.fr'              => 'required|string|max:255|unique:blogs,title,'.$this->blog->id,
            'short_description.fr'  => 'required|string',
            'description.fr'        => 'required|string',
            'image'                 => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.fr.required'                => __('Title is Required in French'),
            'title.fr.unique'                  => __('Title has already taken'),
            'short_description.fr.required'    => __('Please Write Some description in French'),
            'description.fr.required'          => __('Please Write Long description in French'),
            'image.image'                      => __('Image type should be Image'),
        ];
    }
}
