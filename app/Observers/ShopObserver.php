<?php

namespace App\Observers;

use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ShopObserver
{
    public function creating(Shop $shop)
    {
        $slug = Str::slug($shop->name) . "-" . Str::random(9);
        $shop->slug = $slug;
        $shop->created_by = Auth::id();
    }

    public function updating(Shop $shop)
    {
        $slug = Str::slug($shop->name) . "-" . Str::random(9);
        $shop->slug = $slug;
        $shop->updated_by = Auth::id();
    }
}
