<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'image'          => 'required|image',
            'designation.fr' => 'required',
            'description.fr' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => __('Please Select Your Name'),
            'description.fr.required'   => __('Please Write Some description in French'),
            'designation.fr.required'   => __('Please Write Your Designation in French'),
            'image.required'            => __('Please Set an Image'),
            'image.image'               => __('Image type should be Image'),
        ];
    }

}
