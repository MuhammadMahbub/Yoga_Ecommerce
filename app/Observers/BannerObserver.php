<?php

namespace App\Observers;

use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class BannerObserver
{
    public function creating(Banner $banner)
    {
        $banner->created_by = Auth::id();
    }

    public function updating(Banner $banner)
    {
        $banner->updated_by = Auth::id();
    }
}
