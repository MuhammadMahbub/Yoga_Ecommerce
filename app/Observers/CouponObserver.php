<?php

namespace App\Observers;

use App\Models\Coupon;

class CouponObserver
{
    public function creating(Coupon $coupon)
    {
        $coupon->created_by = auth()->user()->id;
    }

    public function updating(Coupon $coupon)
    {
        $coupon->updated_by = auth()->user()->id;
    }
}
