<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsUpdateRequest extends FormRequest
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
            'banner_title.fr' => 'required',
            'title.fr'        => 'required',
            'description.fr'  => 'required',
            'banner_image' => 'image',
            'image'        => 'image',
        ];
    }

    public function messages()
    {
        return [
            'banner_title.fr.required'  =>  __("Banner Title is in French Required") ,
            'title.fr.required'         =>  __("About Us Title in French is Required") ,
            'description.fr.required'   =>  __("Write Some Description About Us in French") ,
            'banner_image.image'        =>  __("Banner Image must be Image Type") ,
            'image.image'               =>  __("Image must be Image Type") ,
        ];
    }
}
