<?php

namespace App\Observers;

use App\Models\ShopThumb;
use Illuminate\Support\Facades\Auth;

class ShopThumbObserver
{
    public function creating(ShopThumb $shop_thumb)
    {
        $shop_thumb->created_by = Auth::id();
    }

    public function updating(ShopThumb $shop_thumb)
    {
        $shop_thumb->updated_by = Auth::id();
    }
}
