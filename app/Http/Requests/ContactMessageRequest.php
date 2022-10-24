<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
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
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => __('Please Give Your Name'),
            'email.required'   => __('Please Give Your Email Address'),
            'email.email'      => __('Please Write a Valid Email Address'),
            'message.required' => __('Please Write Somthing'),
        ];
    }
}
