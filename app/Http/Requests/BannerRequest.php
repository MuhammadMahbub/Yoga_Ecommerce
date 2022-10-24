<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            // "banner_title1.fr"      => 'required',
            // "banner_title2.fr"      => 'required',
            'button_text.fr'        => 'required',
            'banner_image'          => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            // "banner_title1.fr.required"      => __('Upper Banner Title in French is Required'),
            // 'banner_title2.fr.required'      => __('Lower Banner Title in French is Required'),
            'button_text.fr.required'        => __('Button Text in French is Required'),
            'banner_image.required'          => __('Select a Photo of the Banner'),
            'banner_image.image'             => __('Banner Photo must be Image Type'),
        ];
    }
}
