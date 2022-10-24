<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamUpdateRequest extends FormRequest
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
        session()->put(['id' => $this->team->id]);
        return [
            'name_edit'           => 'required',
            'image_edit'          => 'image',
            'designation_edit.fr' => 'required',
            'description_edit.fr' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_edit.required'            => __('Please Select Your Name'),
            'description_edit.fr.required'  => __('Please Write Some description in French'),
            'designation_edit.fr.required'  => __('Please Write Your Designation in French'),
            'image_edit.image'              => __('Image type should be Image.'),
        ];
    }
}
