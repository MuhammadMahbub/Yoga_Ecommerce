<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponUpdateRequest extends FormRequest
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
        session()->put(['id' => $this->coupon->id]);
        return [
            'coupon_code' => 'required',
            'coupon_type' => 'required',
            'coupon_value' => 'required',
            'coupon_expiry_date' => 'required',
        ];
    }
}
