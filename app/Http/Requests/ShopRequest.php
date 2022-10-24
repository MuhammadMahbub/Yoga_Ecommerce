<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'category_id'   => 'required',
            'name.fr'          => 'required',
            'description.fr'   => 'required',
            'price'         => 'required|numeric',
            'thick'         => 'required|numeric',
            'image'         => 'required|image',
            'thumb_image'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'  => __('Please Select Category'),
            'name.fr.required'         => __('Shop Name is Required in French'),
            'description.fr.required'  => __('Please Write Short Description in French'),
            'price.required'        => __('Please Select Shop Price'),
            'price.numeric'         => __('Price should be Number'),
            'thick.required'        => __('Please Select Thickness'),
            'thick.numeric'         => __('Thick should be Number'),
            'image.required'        => __('Select a Photo of tha Shop'),
            'image.image'           => __('Shop Photo must be Image Type'),
            'thumb_image.required'  => __('Select Thumbs of tha Shop'),
        ];
    }
}
