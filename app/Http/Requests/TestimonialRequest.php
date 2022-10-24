<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'name'           => 'required',
            'designation.fr' => 'required',
            'description.fr' => 'required',
            'image'          => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => __('Name is Required'),
            'designation.fr.required' => __('Set The Designation in French'),
            'description.fr.required' => __('Write Short Description in French'),
            'image.image'             => __('Image Should be Image Type'),
        ];
    }
}
