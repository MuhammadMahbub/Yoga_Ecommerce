<?php

namespace App\Observers;

use App\Models\YogaStudio;
use Illuminate\Support\Facades\Auth;

class YogaStudioObserver
{
    public function creating(YogaStudio $yogaStudio)
    {
        $yogaStudio->created_by = Auth::id();
    }

    public function updating(YogaStudio $yogaStudio)
    {
        $yogaStudio->updated_by = Auth::id();
    }
}
