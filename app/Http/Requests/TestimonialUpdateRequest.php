<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialUpdateRequest extends FormRequest
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
        session()->put(['id' => $this->testimonial->id]);
        return
            [
                'testimonial_name'           => 'required',
                'testimonial_designation.fr' => 'required',
                'testimonial_description.fr' => 'required',
                'testimonial_image'          => 'image',
            ];
    }

    public function messages()
    {
        return
            [
                'testimonial_name.required'           => __('Name is Required'),
                'testimonial_designation.fr.required' => __('Set The Designation in French'),
                'testimonial_description.fr.required' => __('Write Short Description in French'),
                'testimonial_image.image'             => __('Image Should be Image Type'),
            ];

    }
}
