<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopUpdateRequest extends FormRequest
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
        session()->put(['id' => $this->shop->id]);
        return [
            'name_edit.fr'          => 'required',
            'description_edit.fr'   => 'required',
            'price_edit'         => 'required|numeric',
            'thick_edit'         => 'required|numeric',
            'image_edit'         => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name_edit.fr.required'         => __('Shop Name is Required in French'),
            'description_edit.fr.required'  => __('Please Write Short Description in French'),
            'price_edit.required'        => __('Please Select Shop Price'),
            'price_edit.numeric'         => __('Price should be Number'),
            'thick_edit.required'        => __('Please Select Thickness'),
            'thick_edit.numeric'         => __('Thick should be Number'),
            'image_edit.image'           => __('Shop Photo must be Image Type'),
        ];
    }
}
