<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerUpdateRequest extends FormRequest
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
        session()->put(['id' => $this->banner->id]);
        return [
            // 'banner_title1_edit.fr'      => 'required',
            // 'banner_title2_edit.fr'      => 'required',
            'button_text_edit.fr'        => 'required',
            'banner_image_edit'          => 'image',
        ];
    }

    public function messages()
    {

        return [
            // 'banner_title1_edit.fr.required'      => __('Upper Banner Title in French is Required'),
            // 'banner_title2_edit.fr.required'      => __('Lower Banner Title in French is Required'),
            'button_text_edit.fr.required'        => __('Button Text in French is Required'),
            'banner_image_edit.image'             => __('Banner Photo must be Image Type'),
        ];
    }
}
