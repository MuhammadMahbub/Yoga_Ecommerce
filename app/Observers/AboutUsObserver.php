<?php

namespace App\Observers;

use App\Models\AboutUs;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AboutUsObserver
{
    public function creating(AboutUs $aboutUs)
    {
        $aboutUs->slug = Str::slug($aboutUs->title)  . '-' . Str::random(5);
        $aboutUs->created_by = Auth::id();
    }

    public function updating(AboutUs $aboutUs)
    {
        $aboutUs->slug = Str::slug($aboutUs->name)  . '-' . Str::random(5);
        $aboutUs->updated_by = Auth::id();
    }
}
