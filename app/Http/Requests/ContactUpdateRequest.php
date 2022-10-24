<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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
            'banner_title.fr'   => 'required',
            'banner_image'      => 'image',
            'title.fr'          => 'required',
            'address'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'banner_title.fr.required'    => __('Please Give the Banner Title in French'),
            'banner_image.image'    => __('Banner Should be Image type'),
            'title.fr.required'    => __('Please Give the Title in French'),
            'email.required'    => __('Please Put Your Email'),
            'phone.required'    => __('Please Put Your Phone no here'),
            'address.required'  => __('Please Put Your Address here'),
        ];
    }
}
